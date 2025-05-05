<?php

namespace App\Services;


use App\Enums\OrderStatus;
use App\Exceptions\CartNotFoundException;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\Middleware\ApplyShippingMiddleware;
use App\Services\Middleware\RecalculateItemsMiddleware;
use App\Services\Middleware\RecalculatePricesMiddleware;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Pipeline;


class CartManager
{
    private ?Cart $cart = null;


    private Collection $changes;


    private OrderStatusService $orderStatusService;


    public function __construct(OrderStatusService $orderManager)
    {
        $this->changes = collect();
        $this->orderStatusService = $orderManager;
    }


    public function convertToOrder(): Order
    {
        $cart = $this->getPersistentCart();
        $cart->ordered_at = now();

        $order = $this->orderStatusService->newOrder($cart);

        $this->resetCart();

        return $order;
    }


    public function firstItem(Product $product): ?OrderItem
    {
        return $this->getCart()?->items()->firstWhere('product_id', $product->id);
    }


    public function firstOrNewItem(Product $product): OrderItem
    {
        $cart = $this->getCart() ?? $this->createCart();
        $item = $cart->items()->firstWhere('product_id', $product->id);

        if ($item) {
            return $item;
        }


        return $cart->items()->make([
            'product_id' => $product->id,
            'product_title' => $product->title,
            'amount' => 0,
        ]);
    }


    public function getCart(): ?Cart
    {
        if ($this->cart) {
            return $this->cart;
        }

        $cartId = Cookie::get('cart');
        $cart = $cartId ? Cart::find($cartId) : null;

        if (! $cart) {
            $cart = Auth::guard('web')->user()?->cart()->first();
        }

        if ($cart) {
            $this->cart = $cart;
            $this->reassignCartToUser();
        }

        return $cart;
    }


    public function getChangesBag(): Collection
    {
        return $this->changes;
    }


    public function getPersistentCart(): Cart
    {
        $cart = $this->getCart();

        if (is_null($cart)) {
            throw new CartNotFoundException();
        }

        return $cart;
    }


    public function recalculate(): static
    {
        $cart = $this->getPersistentCart()->refresh();

        Pipeline::send($cart)->through([
            RecalculateItemsMiddleware::class,
            RecalculatePricesMiddleware::class,
            ApplyShippingMiddleware::class,
        ])->then(fn(Cart $cart) => $cart->save());

        $cart->refresh();

        return $this;
    }


    private function createCart(): Cart
    {
        $customer = Auth::guard('web')->user();
        $cartId = Cookie::get('cart');
        $cart = $cartId ? Cart::find($cartId) : Cart::make();
        $cart ??= Cart::make();

        $cart->fill([
            'customer_id' => $customer?->id,
            'email' => $customer?->email,
            'status' => OrderStatus::CART,
        ])->save();

        Cookie::queue('cart', $cart->id, 60 * 24 * 90);

        $this->cart = $cart;

        $this->reassignCartToUser();

        return $cart;
    }


    private function reassignCartToUser(): void
    {
        $customer = Auth::guard('web')->user();

        if ($customer && $customer->id !== $this->cart->customer_id) {
            $this->cart->update(['customer_id' => $customer->id]);
        }
    }


    private function resetCart(): void
    {
        Cookie::queue(Cookie::forget('cart'));

        $this->cart = null;
    }
}
