<?php

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('seller');

        // Filter Nama Produk
        if ($request->filled('product_name')) {
            $query->where('name', 'like', '%'.$request->product_name.'%');
        }

        // Filter Nama Toko
        if ($request->filled('store_name')) {
            $query->whereHas('seller', function ($q) use ($request) {
                $q->where('storeName', 'like', '%'.$request->store_name.'%');
            });
        }

        // Filter Kategori
        if ($request->filled('category')) {
            $query->where('category', 'like', '%'.$request->category.'%');
        }

        // Filter Lokasi (Kota / Provinsi dari seller)
        if ($request->filled('city')) {
            $query->whereHas('seller', function ($q) use ($request) {
                $q->where('picCity', 'like', '%'.$request->city.'%');
            });
        }

        if ($request->filled('province')) {
            $query->whereHas('seller', function ($q) use ($request) {
                $q->where('picProvince', 'like', '%'.$request->province.'%');
            });
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('katalog.index', [
            'products' => $products,
            'filters'  => $request->only(['product_name','store_name','category','city','province']),
        ]);
    }

    public function show($id)
    {
    $product = Product::with(['seller', 'reviews.user'])->findOrFail($id);

    return view('katalog.detail', compact('product'));
    }

}
