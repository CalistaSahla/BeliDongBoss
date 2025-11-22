<?php

namespace App\Http\Controllers;

use App\Models\Product;

class KatalogProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);

        return view('katalog.index', compact('products'));
    }
}
