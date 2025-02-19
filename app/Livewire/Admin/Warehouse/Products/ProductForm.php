<?php

namespace App\Livewire\Admin\Warehouse\Products;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\Product;
use App\Traits\Admin\Menu\BaseWarehouseMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;


class ProductForm extends BaseAdminComponent
{
    use BaseWarehouseMenuItems;


    public ?Product $product = null;


    public bool $isExist = false;


    public function mount(): void
    {
        if ($this->product?->exists) {
            $this->isExist = true;
        } else {
            $this->product = new Product([
                'is_active' => true,
                'stock' => 0,
                'price' => 0,
            ]);
        }
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.warehouse.products.form'), title: __('pages.products.title'));
    }


    public function save(): void
    {
        $this->validate();

        $message = $this->isExist ? __('global.updateSuccess') : __('global.createSuccess');

        $this->product->save();

        $this->alertSuccess($message);

        $this->redirectRoute('admin.warehouse.products.index', navigate: true);
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addTaxMenuItem();
    }


    protected function rules(): array
    {
        $titleRule = Rule::unique('products', 'title');

        if ($this->isExist) {
            $titleRule->ignore($this->product);
        }

        return [
            'product.title' => ['required', 'string', 'max:255', $titleRule],
            'product.description' => ['nullable', 'string', 'max:2048'],
            'product.is_active' => ['present', 'boolean'],
            'product.ean' => ['nullable', 'string', 'max:48'],
            'product.sku' => ['nullable', 'string', 'max:60'],
            'product.mpn' => ['nullable', 'string', 'max:60'],
            'product.stock' => ['required', 'integer', 'min:0'],
            'product.tax_id' => ['required', 'integer', 'exists:taxes,id'],
            'product.category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'product.brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'product.price' => ['required', 'numeric', 'min:0'],
            'product.discount_price' => ['sometimes', 'nullable', 'numeric', 'min:0', 'lte:product.price'],
        ];
    }


    private function addTaxMenuItem(): array
    {
        $sidebarMenu = collect($this->getBaseWarehouseMenuItems());
        $newMenuItem = new SubMenuItem(
            label: $this->isExist ? __('pages.products.edit') : __('pages.products.new'),
            type: MenuItemType::InternalLink,
            route: $this->isExist ? 'admin.warehouse.products.show' : 'admin.warehouse.products.create',
            params: $this->isExist ? ['product' => $this->product->id] : [],
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === __('pages.products.title');
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }
}
