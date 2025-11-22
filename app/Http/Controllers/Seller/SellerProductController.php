<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index()
    {
        $sellerId = Auth::user()->seller->id;

        $products = Product::where('seller_id', $sellerId)->paginate(10);

        return view('seller.produk.index', compact('products'));
    }

    public function create()
    {
        return view('seller.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|integer',
            'stock'       => 'required|integer',
            'category'    => 'required',
            'description' => 'required',
            'image'       => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $sellerId = Auth::user()->seller->id;

        // Upload gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product-images', 'public');
        }

        Product::create([
            'seller_id'   => $sellerId,
            'name'        => $request->name,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category'    => $request->category,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('seller.product.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $this->authorizeSeller($product);

        return view('seller.produk.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $this->authorizeSeller($product);

        $request->validate([
            'name'        => 'required',
            'price'       => 'required|integer',
            'stock'       => 'required|integer',
            'category'    => 'required',
            'description' => 'required',
            'image'       => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload new image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product-images', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category'    => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('seller.product.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $this->authorizeSeller($product);

        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus.');
    }

    private function authorizeSeller($product)
    {
        if ($product->seller_id !== Auth::user()->seller->id) {
            abort(403, 'Tidak diizinkan');
        }
    }
}
