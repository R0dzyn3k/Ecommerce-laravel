<?php

namespace App\Livewire\Admin;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class Login extends Component
{
    public string $email;


    public string $password;


    public bool $remember = false;


    protected $rules = [
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string', 'min:3'],
        'remember' => ['nullable', 'boolean'],
    ];


    public function auth(): void
    {
        $data = $this->validate();

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if (Auth::guard('admin')->attempt($credentials, $this->remember)) {
            session()->regenerate();

            $this->redirect(route('admin.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('Nieprawidłowe dane logowania.'),
        ]);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.admin.login')->layout('components.layouts.app', ['title' => __('pages.login')]);
    }
}
