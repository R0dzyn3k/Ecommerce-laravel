<?php

namespace App\Livewire\Web\Order;


use App\Contracts\BillingInterface;
use App\Contracts\ShippingInterface;
use App\Facades\Cart as CartFacade;
use App\Models\Cart;
use App\Services\BillingManager;
use App\Services\ShippingManager;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;


class FinalizeOrder extends Component
{
    public Cart $cart;


    private BillingInterface $billing;


    private ShippingInterface $shipping;


    public function buy(): void
    {
        CartFacade::convertToOrder();

        $url = URL::signedRoute('web.order.summary', ['order' => $this->cart->id], now()->addMinutes(5));

        $this->redirect($url, navigate: true);
    }


    public function mount(): void
    {
        CartFacade::recalculate();

        $cart = CartFacade::getPersistentCart();
        $this->billing = app(BillingManager::class)->getDriver($cart->billing_driver);
        $this->shipping = app(ShippingManager::class)->getDriver($cart->shipping_driver);

        if (! $cart->items()->exists()
            || ! $this->billing->hasFilledData($cart->billing_data)
            || ! $this->shipping->hasFilledData($cart->shipping_data)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $this->cart = $cart;
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.order.finalize-order', [
            'shippingDriver' => $this->shipping,
            'billingDriver' => $this->billing,
            'items' => $this->cart->items()->with('product')->get(),
        ])->layout('components.layouts.web-order', [
            'title' => 'Finalizacja zamówienia',
        ]);
    }
}
