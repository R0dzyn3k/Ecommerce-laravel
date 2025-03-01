<?php

namespace App\Livewire\Web\Auth;


use App\Models\Customer;
use App\Traits\Admin\Alerts;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;


class VerifiedEmail extends Component
{
    use Alerts;

    public Customer $customer;

    public function homepage(): void
    {
        $this->redirectRoute('web.homepage', navigate: true);
    }


    public function mount(): void
    {
        abort_if(! URL::hasValidSignature(request()), Response::HTTP_NOT_FOUND);

        if($this->customer->hasVerifiedEmail()) {
            $this->profile();

            return;
        }

        $this->customer->markEmailAsVerified();

        event(new Verified($this->customer));

        Auth::login($this->customer);
    }


    public function profile(): void
    {
        $this->redirectRoute('web.profile.edit', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.auth.verified-email')->layout('components.layouts.web-page-card', ['title' => 'Potwierdzono adres e-mail']);
    }
}
