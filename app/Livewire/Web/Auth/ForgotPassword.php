<?php

namespace App\Livewire\Web\Auth;


use App\Traits\Admin\Alerts;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Password;
use Livewire\Component;


class ForgotPassword extends Component
{
    use Alerts;


    public string $email;


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.auth.forgot-password')
            ->layout('components.layouts.web-page-card', [
                'title' => __('auth.forgotPassword'),
            ]);
    }


    public function sendEmail(): void
    {
        $this->validate();

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink($this->only('email'));

        if ($status !== Password::RESET_LINK_SENT && $status !== Password::INVALID_USER) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        $this->alertSuccess($status);

        $this->redirectRoute('web.login', navigate: true);
    }


    protected function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
        ];
    }
}
