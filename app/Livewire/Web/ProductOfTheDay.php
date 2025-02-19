<?php

namespace App\Livewire\Web;


use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;


class ProductOfTheDay extends Component
{
    public Product $product;


    public ?string $url;


    public function mount(): void
    {
        $product = Product::query()->inRandomOrder()->first();

        $this->product = $product;
        $this->url = $product->hasMedia('product_photo')
            ? $product->getFirstMediaUrl('product_photo', 'thumbnail')
            : null;

    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.product-of-the-day');
    }
}

