<?php

namespace App\Livewire\Web\Auth;


use App\Traits\Admin\Alerts;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class Login extends Component
{
    use Alerts;


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

        if (Auth::guard('web')->attempt($credentials, $this->remember)) {
            session()->regenerate();

            $this->redirectRoute('web.homepage', navigate: true);
        }

        $this->alertError('Nieprawidłowe dane logowania.');

        throw ValidationException::withMessages([
            'email' => __('Nieprawidłowe dane logowania.'),
        ]);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.auth.login')->layout('components.layouts.web-page-card', ['title' => __('pages.login')]);
    }
}
