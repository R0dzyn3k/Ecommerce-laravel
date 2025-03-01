<?php

namespace App\Livewire\Web\Auth;


use App\Models\Customer;
use App\Traits\Admin\Alerts;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;


class VerifyEmail extends Component
{
    use Alerts;


    public Customer $customer;


    public function logOut()
    {
        $this->redirectRoute('web.logout', navigate: true);
    }


    public function mount(): void
    {
        $customer = Auth::guard('web')->user();

        if (! $customer) {
            $this->redirectRoute('web.login', navigate: true);

            return;
        }

        if ($customer->hasVerifiedEmail()) {
            $this->redirectRoute('web.profile.edit', navigate: true);
        }

        $this->customer = $customer;
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.auth.verify-email')->layout('components.layouts.web-page-card', ['title' => __('auth.verifyEmail')]);
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
