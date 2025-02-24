<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)
            ->orderBy('title')
            ->paginate(9);

        return view('web.products', compact('products'));
    }


    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('web.product', compact('product'));
    }
}
