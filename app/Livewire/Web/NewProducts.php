<?php

namespace App\Livewire\Web;


use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;


class NewProducts extends Component
{
    /**
     * @var Collection<Product>
     */
    public Collection $products;


    public function mount(): void
    {
        $this->products = Product::query()->where('is_active', true)->orderBy('created_at', 'desc')->limit(3)->get();

        $this->products->map(function (Product $product) {
            $product->url = $product->hasMedia('product_photo')
                ? $product->getFirstMediaUrl('product_photo', 'thumbnail')
                : null;
        });
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.new-products');
    }
}

