<?php

namespace App\Livewire\Web\Order;


use App\Facades\Cart as CartFacade;
use App\Models\Cart;
use App\Services\BillingManager;
use App\Services\ShippingManager;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;


class DeliveryAndPayment extends Component
{
    public Cart $cart;


    public function mount(): void
    {
        $cart = CartFacade::getPersistentCart();

        abort_if(! $cart->items()->exists(), Response::HTTP_NOT_FOUND);

        $this->cart = $cart;
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        $title = 'Dostawa i płatność';
        $shippingManager = app(ShippingManager::class);
        $billingManager = app(BillingManager::class);

        return view('livewire.web.order.delivery-and-payment', compact('shippingManager', 'billingManager'))
            ->layout('components.layouts.web-order', compact('title'));
    }


    public function saveDeliveryData(): void
    {
        $this->validate();

        $shippingManager = app(ShippingManager::class);
        $billingManager = app(BillingManager::class);

        $this->validate(array_merge(
            $shippingManager->getDriver($this->cart->shipping_driver)->getValidationRules(),
            $billingManager->getDriver($this->cart->billing_driver)->getValidationRules()
        ));

        $this->cart->save();

        $this->redirectRoute('web.order.finalize-order', navigate: true);
    }


    protected function rules(): array
    {
        $shippingManager = app(ShippingManager::class);
        $billingManager = app(BillingManager::class);

        return [
            'cart.shipping_driver' => ['required', 'string', Rule::in($shippingManager->getDrivers()->keys())],
            'cart.billing_driver' => ['required', 'string', Rule::in($billingManager->getDrivers()->keys())],
            'cart.customer_note' => ['sometimes', 'nullable', 'string', 'max:500'],
        ];
    }
}
