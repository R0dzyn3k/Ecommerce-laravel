<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;


class HomepageController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
