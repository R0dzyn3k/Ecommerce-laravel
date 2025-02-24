<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\View\View;


class PageController extends Controller
{
    public function cookies(): View
    {
        return view('web.pages.cookies');
    }


    public function privacy(): View
    {
        return view('web.pages.privacy');
    }


    public function terms(): View
    {
        return view('web.pages.terms');
    }
}
