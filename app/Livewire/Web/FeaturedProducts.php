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
        $this->products = Product::query()->where('is_active', true)->orderBy('id')->limit(2)->get();
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('components.web.products-bar', [
            'products' => $this->products,
        ]);
    }
}

