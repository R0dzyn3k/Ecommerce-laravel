<?php

namespace App\Notifications;


use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;


class CustomerVerifyEmail extends VerifyEmail
{
    /** @var User $notifiable */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Zwerifikuj adres e-mail')
            ->view('emails.web.verify-email', [
                'url' => $this->verificationUrl($notifiable),
                'expire' => config('auth.passwords.users.expire'),
            ]);
    }


    /** @var User $notifiable */
    protected function verificationUrl($notifiable): string
    {
        return URL::temporarySignedRoute(
            name: 'web.verified-email',
            expiration: now()->addMinutes(config('auth.passwords.users.expire')),
            parameters: [
                'customer' => $notifiable->getKey(),
            ]
        );
    }
}
