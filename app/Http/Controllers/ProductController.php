<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('seller');

        if ($request->filled('product_name')) {
            $query->where('name', 'like', '%'.$request->product_name.'%');
        }

        if ($request->filled('store_name')) {
            $query->whereHas('seller', function ($q) use ($request) {
                $q->where('storeName', 'like', '%'.$request->store_name.'%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category', 'like', '%'.$request->category.'%');
        }

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
