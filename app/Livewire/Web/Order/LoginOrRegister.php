<?php

namespace App\Livewire\Web\Order;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;


class LoginOrRegister extends Component
{
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.order.login-or-create')
            ->layout('components.layouts.web-order', [
                'title' => __('pages.login'),
            ]);
    }
}
