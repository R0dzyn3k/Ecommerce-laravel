<?php

namespace App\Livewire\Web\Auth;


use App\Models\Customer;
use App\Traits\Admin\Alerts;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Livewire\Component;


class VerifyEmail extends Component
{
    use Alerts;


    public Customer $customer;


    public bool $verify = false;


    public function homepage(): void
    {
        $this->redirectRoute('web.homepage', navigate: true);
    }


    public function login(): void
    {
        $this->redirectRoute('web.login', navigate: true);
    }


    public function mount(): void
    {
        $customer = request()->user('web');

        if (! $customer) {
            $this->redirectRoute('web.login', navigate: true);

            return;
        }

        $this->customer = $customer;

        if ($customer->hasVerifiedEmail()) {
            $this->redirectRoute('web.profile.edit', navigate: true);

            return;
        }

        if (URL::hasValidSignature(request())) {
            $this->verify = true;

            $customer->markEmailAsVerified();

            event(new Verified($customer));
        }
    }


    public function profile(): void
    {
        $this->redirectRoute('web.profile.edit', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.auth.verify-email')->layout('components.layouts.web', ['title' => __('auth.verifyEmail')]);
    }


    public function logOut()
    {
        $this->redirectRoute('web.logout', navigate: true);
    }

    public function resend(): void
    {
        $key = 'verify-email:' . $this->customer->id;

        if (RateLimiter::tooManyAttempts($key, 1)) {
            $this->alertError('Za dużo prób logowania, spróbuj za ' . RateLimiter::availableIn($key));

            return;
        }

        RateLimiter::hit($key);

        $this->customer->sendEmailVerificationNotification();

        $this->alertSuccess('Wysłano link weryfikacyjny na adres e-mail.');
    }
}
