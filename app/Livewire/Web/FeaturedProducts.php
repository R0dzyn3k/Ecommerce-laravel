<?php

namespace App\Livewire\Web;


use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;


class FeaturedProducts extends Component
{
    /**
     * @var Collection<Product>
     */
    public Collection $products;


    public function mount(): void
    {
        $this->products = Product::query()->orderBy('id')->limit(2)->get();

        $this->products->map(function (Product $product) {
            $product->url = $product->hasMedia('product_photo')
                ? $product->getFirstMediaUrl('product_photo', 'thumbnail')
                : null;
        });
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.featured-products');
    }
}

