<?php

namespace App\Livewire\Web\Auth;


use App\Models\User;
use App\Traits\Admin\Alerts;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Component;


class ResetPassword extends Component
{
    use Alerts;


    #[Locked]
    public string $email;


    public string $password;


    public string $password_confirmation;


    #[Locked]
    public string $token;


    public function login(): void
    {
        $this->redirectRoute('web.login', navigate: true);
    }


    public function mount(): void
    {
        abort_if(! URL::hasValidSignature(request()), 404);

        $this->email = request()->query('email');
        $this->token = request()->route('token');
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.auth.reset-password')->layout('components.layouts.web', ['title' => __('auth.setPassword')]);
    }


    public function setNewPassword(): void
    {
        $this->validate();

        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'token' => $this->token,
        ], static function (User $user, string $password) {
            $user->forceFill([
                'password' => $password,
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));

        });

        if ($status !== Password::PASSWORD_RESET) {
            $this->addError('password', __($status));

            return;
        }

        $this->alertSuccess($status);

        $this->redirectRoute('web.login', navigate: true);
    }


    protected function rules(): array
    {
        return [
            'password' => ['required', 'string', \Illuminate\Validation\Rules\Password::default(), 'confirmed'],
        ];
    }
}
