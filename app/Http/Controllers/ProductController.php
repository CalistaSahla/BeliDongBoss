<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest()
            ->paginate(12)
            ->withQueryString();

        return view('katalog.index', compact('products'));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('katalog.detail', compact('product'));
    }
}
