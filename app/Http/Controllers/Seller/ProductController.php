<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
  
    public function index()
    {
        $products = \App\Models\Product::latest()->get();

        return view('katalog.index', compact('products'));
    }


    public function create()
    {
        return view('seller.produk.create');
    }

    public function store(Request $request)
    {
        $seller = Seller::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required',
            'thumbnail' => 'required|image',
            'images.*' => 'image',
        ]);

        $thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->images as $img) {
                $images[] = $img->store('products', 'public');
            }
        }

        Product::create([
            'seller_id' => $seller->id,
            'name' => $request->name,
            'category' => $request->category,
            'condition' => $request->condition,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'thumbnail' => $thumbnail,
            'images' => $images,
        ]);

        return redirect()->route('seller.product.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }
}
