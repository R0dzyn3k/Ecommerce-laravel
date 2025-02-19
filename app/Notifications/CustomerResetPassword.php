<?php

namespace App\Notifications;


use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;


class CustomerResetPassword extends ResetPassword
{
    /** @var User $notifiable */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Powiadomienie o zresetowaniu hasła')
            ->view('emails.web.reset-password', [
                'url' => $this->resetUrl($notifiable),
                'expire' => config('auth.passwords.users.expire'),
            ]);
    }


    /** @var User $notifiable */
    protected function resetUrl($notifiable): string
    {
        return URL::temporarySignedRoute('web.reset-password', now()->addMinutes(config('auth.passwords.users.expire')), [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);
    }
}
