<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\View\View;


class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::where('is_active', true)->get();

        return view('web.brands.index', compact('brands'));
    }


    public function show(string $slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();

        if (! $brand || ! $brand->is_active) {
            abort(404);
        }

        $products = $brand->products()->where('is_active', true)->paginate(9);

        return view('web.brands.show', compact('brand', 'products'));
    }
}
