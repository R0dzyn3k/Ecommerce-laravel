<?php

namespace App\Http\Controllers\Admin\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;


class AdminLogoutController extends Controller
{
    public function destroy(Request $request)
    {
        return $this->logout($request);
    }


    public function index(Request $request)
    {
        return $this->logout($request);
    }


    private function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('web.homepage.index');
    }
}
