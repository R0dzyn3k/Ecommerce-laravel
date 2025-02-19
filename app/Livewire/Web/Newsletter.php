<?php

namespace App\Livewire\Web;


use App\Traits\Admin\Alerts;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;


class Newsletter extends Component
{
    use Alerts;


    public string $email;


    public bool $subscribed = false;


    protected $rules = [
        'email' => ['required', 'string', 'email', 'unique:newsletters,email'],
    ];


    public function addToNewsletter(): void
    {
        $this->validate();

        \App\Models\Newsletter::create([
            'email' => $this->email,
            'user_id' => auth('web')?->id(),
        ]);

        $this->alertSuccess('Pomyślnie zapisano do newslettera.');

        $this->subscribed = true;

    }


    public function mount(): void
    {
        $this->subscribed = (bool) auth('web')->user()?->subscribedNewsletter();
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.newsletter');
    }
}

