<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;


class CartController extends Controller
{
    public function show()
    {
        return view('web.cart');
    }
}
