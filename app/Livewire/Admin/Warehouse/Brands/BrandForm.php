<?php

namespace App\Livewire\Admin\Warehouse\Brands;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\Brand;
use App\Traits\Admin\Menu\BaseWarehouseMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;


class BrandForm extends BaseAdminComponent
{
    use BaseWarehouseMenuItems;


    public ?Brand $brand = null;


    public bool $isExist = false;


    public function mount(): void
    {
        if ($this->brand?->exists) {
            $this->isExist = true;
        } else {
            $this->brand = new Brand(['is_active' => true]);
        }
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.warehouse.brands.form'), title: __('pages.brands.title'));
    }


    public function save(): void
    {
        $this->validate();

        $message = $this->isExist ? __('global.updateSuccess') : __('global.createSuccess');

        $this->brand->save();

        $this->alertSuccess($message);

        $this->redirectRoute('admin.warehouse.brands.index', navigate: true);
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addMenuItem();
    }


    protected function rules(): array
    {
        $titleRule = Rule::unique('brands', 'title');

        if ($this->isExist) {
            $titleRule->ignore($this->brand);
        }

        return [
            'brand.title' => ['required', 'string', 'max:255', $titleRule],
            'brand.description' => ['nullable', 'string', 'max:2048'],
            'brand.is_active' => ['present', 'boolean'],
        ];
    }


    private function addMenuItem(): array
    {
        $sidebarMenu = collect($this->getMenuItems());
        $newMenuItem = new SubMenuItem(
            label: $this->isExist ? __('pages.brands.edit') : __('pages.brands.new'),
            type: MenuItemType::InternalLink,
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === __('pages.brands.title');
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }
}
