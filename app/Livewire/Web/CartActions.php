<?php

namespace App\Livewire\Web;


use App\Facades\Cart;
use App\Models\Product;
use App\Traits\Admin\Alerts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;


class CartActions extends Component
{
    use Alerts;


    public ?\App\Models\Cart $cart = null;


    public int $itemsCount = 0;


    #[On('addToCart')]
    public function addToCart(int $productId, int $amount = 1): void
    {
        try {
            Validator::make(data: [
                'productId' => $productId,
                'amount' => $amount,
            ], rules: [
                'productId' => ['required', 'integer', 'exists:products,id'],
                'amount' => ['required', 'integer', 'min:1'],
            ], attributes: [
                'productId' => 'ID produktu',
                'amount' => 'Ilość produktu',
            ])->validate();

            $product = Product::where('is_active', true)->findOrFail($productId);

            if ($amount > $product->stock) {
                throw ValidationException::withMessages(['amount' => 'Produkt nie jest dostępny w tej ilości.']);
            }

            $item = Cart::firstOrNewItem($product);

            if (($item->amount + $amount) > $product->stock) {
                throw ValidationException::withMessages([
                    'amount' => 'Produkt nie jest dostępny w tej ilości.',
                ]);
            }
        } catch (ValidationException $e) {
            foreach ($e->validator->errors()->all() as $message) {
                $this->alertError($message);
            }

            return;
        }

        $item->fill(['amount' => $amount + $item->amount])->save();

        if (is_null($this->cart)) {
            $this->assignCart();
        }

        $this->itemsCount += $amount;

        Cart::recalculate();

        $this->alertSuccess('Produkt dodany do koszyka!');
    }


    public function goToCart(): void
    {
        $this->redirectRoute('web.cart', navigate: true);

    }


    public function mount(): void
    {
        $this->assignCart();
    }


    #[On('removeFromCart')]
    public function removeFromCart(int $productId, ?int $amount = null): void
    {
        try {
            Validator::make(data: [
                'productId' => $productId,
                'amount' => $amount,
            ], rules: [
                'productId' => ['required', 'integer', 'exists:products,id'],
                'amount' => ['sometimes', 'nullable', 'integer', 'min:1'],
            ], attributes: [
                'productId' => 'ID produktu',
                'amount' => 'Ilość produktu',
            ])->validate();

            $product = Product::where('is_active', true)->findOrFail($productId);
            $item = Cart::firstItem($product);

            if (! $item) {
                throw ValidationException::withMessages([
                    'amount' => 'Produkt nie znajduje się w koszyku.',
                ]);
            }

            if ($amount && $amount > $item->amount) {
                throw ValidationException::withMessages([
                    'amount' => 'Produkt nie znajduje się w koszyku w takiej ilości.',
                ]);
            }
        } catch (ValidationException $e) {
            foreach ($e->validator->errors()->all() as $message) {
                $this->alertError($message);
            }

            return;
        }

        if (! $amount || $amount === $item->amount) {
            $this->itemsCount -= $item->amount;

            $item->delete();
        } else {
            $item->decrement('amount', $amount);

            $this->itemsCount -= $amount;
        }

        if (is_null($this->cart)) {
            $this->assignCart();
        }

        Cart::recalculate();

        $this->alertSuccess('Produkt usunięty z koszyka!');
    }


    public function render()
    {
        return view('livewire.web.cart-actions');
    }


    private function assignCart(): void
    {
        $this->cart = Cart::getCart();
        $this->itemsCount = $this->cart?->items()->sum('amount') ?? 0;
    }
}
