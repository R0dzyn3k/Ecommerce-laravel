<?php

namespace App\Models\Notifications;


use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;


class CustomerVerifyEmail extends VerifyEmail
{
    protected function buildMailMessage($url): MailMessage
    {
        return (new MailMessage)
            ->subject(__('email.verifyEmail'))
            ->view('emails.web.verify-email', compact('url'));
    }


    protected function verificationUrl($notifiable): string
    {
        $expiration = Carbon::now()->addMinutes(60); //TODO get from settings
        $id = $notifiable->getKey();
        $hash = sha1($notifiable->getEmailForVerification());
        $parameters = compact('id', 'hash');

        return URL::temporarySignedRoute('web.account.confirm', $expiration, $parameters); //TODO Get new route name
    }
}
