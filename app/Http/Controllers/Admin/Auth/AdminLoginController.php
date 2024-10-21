<?php

namespace App\Http\Controllers\Admin\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;


class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }


    public function store(LoginRequest $request)
    {
        $request->validated();

        if (Auth::guard('admin')->attempt($request->only(['email', 'password']), $request->boolean(['remember']))) {
            $request->session()->regenerate();

            return Redirect::route('admin.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => __('Nieprawidłowe dane logowania.'),
        ]);
    }
}
