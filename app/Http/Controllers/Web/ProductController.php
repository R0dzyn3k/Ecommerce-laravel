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

        return view('web.products.index', compact('products'));
    }


    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        if (! $product || ! $product->is_active) {
            abort(404);
        }

        $relatedProducts = $product->category_id
            ? Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->where('is_active', true)
                ->limit(3)
                ->get()
            : collect();

        return view('web.products.show', compact('product', 'relatedProducts'));
    }
}
