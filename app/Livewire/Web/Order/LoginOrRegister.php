<?php

namespace App\Livewire\Web\Order;


use App\Facades\Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;


class LoginOrRegister extends Component
{
    public function mount(): void
    {
        $cart = Cart::getCart();

        abort_if(! $cart || ! $cart->items()->exists(), Response::HTTP_NOT_FOUND);

        if (Auth::guard('web')->check()) {
            $this->redirectRoute('web.order.delivery-and-payment', navigate: true);
        }
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.order.login-or-create')
            ->layout('components.layouts.web-order', [
                'title' => __('pages.login'),
            ]);
    }
}
