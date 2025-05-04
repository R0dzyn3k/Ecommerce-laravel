<?php

namespace App\Livewire\Web\Order;


use App\Facades\Cart as CartFacade;
use App\Models\BillingMethod;
use App\Models\Cart;
use App\Models\ShippingMethod;
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


    public function getBillingDriver(): string
    {
        return BillingMethod::firstWhere('id', $this->cart->billing_method_id)->driver;
    }


    public function getShippingDriver(): string
    {
        return ShippingMethod::firstWhere('id', $this->cart->shipping_method_id)->driver;
    }


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

        $this->cart->fill([
            'shipping_driver' => $this->getShippingDriver(),
            'billing_driver' => $this->getBillingDriver(),
        ]);

        $this->validate(array_merge(
            $shippingManager->getDriver($this->cart->shipping_driver)->getValidationRules(),
            $billingManager->getDriver($this->cart->billing_driver)->getValidationRules()
        ));

        $this->cart->save();

        CartFacade::recalculate();

        $this->redirectRoute('web.order.finalize-order', navigate: true);
    }


    protected function rules(): array
    {
        return [
            'cart.shipping_method_id' => ['required', 'integer', Rule::exists('shipping_methods', 'id')->where('is_active', true)],
            'cart.billing_method_id' => ['required', 'integer', Rule::exists('billing_methods', 'id')->where('is_active', true)],
            'cart.customer_note' => ['sometimes', 'nullable', 'string', 'max:500'],
        ];
    }
}
