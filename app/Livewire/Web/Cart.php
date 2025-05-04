<?php

namespace App\Livewire\Web;


use App\Facades\Cart as CartFacade;
use App\Models\Cart as CartModel;
use App\Models\OrderItem;
use App\Traits\Admin\Alerts;
use Illuminate\Support\Collection;
use Livewire\Component;


class Cart extends Component
{
    use Alerts;


    public ?CartModel $cart = null;


    public Collection $items;


    public bool $showCart = false;


    public function decrement(int $productId): void
    {
        $this->dispatch('removeFromCart', $productId, 1);

        $item = $this->items->firstWhere('product_id', $productId);

        /** @var OrderItem $item */
        if ($item) {
            if ($item->amount - 1 <= 0) {
                $this->items->forget($this->items->search(fn(OrderItem $item) => $item->product_id === $productId));
            } else {
                $item->amount--;
            }
        }
    }


    public function increment(int $productId): void
    {
        $this->dispatch('addToCart', $productId, 1);

        $item = $this->items->firstWhere('product_id', $productId);

        /** @var OrderItem $item */
        if ($item && $item->amount + 1 <= $item->product->stock) {
            $item->amount++;
        }
    }


    public function mount(): void
    {
        CartFacade::recalculate();

        $cart = CartFacade::getCart();
        $this->cart = $cart;
        $this->showCart = $cart && $cart->items()->exists();
        $this->items = $this->showCart
            ? $cart->items()->with('product')->get()
            : collect();
    }


    public function removeItem(int $productId): void
    {
        $this->dispatch('removeFromCart', $productId);

        $this->items->forget($this->items->search(fn(OrderItem $item) => $item->product_id === $productId));
    }


    public function render()
    {
        return view('livewire.web.cart');
    }


    public function updateItem(int $productId, int $value): void
    {
        $item = $this->cart?->items()->firstWhere('product_id', $productId);

        if (! $item || $item->amount === $value) {
            return;
        }

        $dif = abs($value - $item->amount);

        $this->dispatch($value > $item->amount ? 'addToCart' : 'removeFromCart', $productId, $dif);

        $item = $this->items->firstWhere('product_id', $productId);

        if (! $item || $item->amount === $value || $value > $item->product->stock) {
            return;
        }

        $item->amount = $value;

        if ($value <= 0) {
            $this->items->forget($this->items->search(fn(OrderItem $item) => $item->product_id === $productId));
        }
    }
}
