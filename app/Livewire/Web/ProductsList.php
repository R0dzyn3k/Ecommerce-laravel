<?php

namespace App\Livewire\Web;

use App\Models\{Brand, Category, Product};
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;

    public ?int $categoryId = null;
    public ?int $brandId = null;
    public ?string $priceFrom = null;
    public ?string $priceTo = null;
    public string $sortBy = 'title';
    public string $sortDirection = 'asc';

    protected $queryString = [
        'categoryId' => ['except' => null],
        'brandId' => ['except' => null],
        'priceFrom' => ['except' => null],
        'priceTo' => ['except' => null],
        'sortBy' => ['except' => 'title'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function updating($key): void
    {
        if ($key !== 'page') {
            $this->resetPage();
        }
    }

    public function clearFilters(): void
    {
        $this->reset(['categoryId', 'brandId', 'priceFrom', 'priceTo', 'sortBy', 'sortDirection']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query()->where('is_active', true);

        if ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }

        if ($this->brandId) {
            $query->where('brand_id', $this->brandId);
        }

        if ($this->priceFrom) {
            $query->whereRaw('COALESCE(discount_price, price_gross) >= ?', [(float)$this->priceFrom]);
        }

        if ($this->priceTo) {
            $query->whereRaw('COALESCE(discount_price, price_gross) <= ?', [(float)$this->priceTo]);
        }

        $products = $query
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(9);

        return view('livewire.web.products-list', [
            'products' => $products,
            'categories' => Category::mapForSelect(),
            'brands' => Brand::mapForSelect(),
        ]);
    }

    public function setSorting(): void
    {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
}
