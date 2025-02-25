<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\View\View;


class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::where('is_active', true)->get();

        return view('web.categories.index', compact('categories'));
    }


    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        if (! $category || ! $category->is_active) {
            abort(404);
        }

        $products = $category->products()->where('is_active', true)->paginate(9);

        return view('web.categories.show', compact('category', 'products'));
    }
}
