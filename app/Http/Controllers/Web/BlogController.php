<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\View\View;


class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::latest()->paginate(9);

        return view('web.blog.index', compact('blogs'));
    }


    public function show(string $slug): View
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('web.blog.show', compact('blog'));
    }
}
