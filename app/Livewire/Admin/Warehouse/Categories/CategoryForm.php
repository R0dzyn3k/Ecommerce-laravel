<?php

namespace App\Livewire\Admin\Warehouse\Categories;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\Category;
use App\Traits\Admin\Menu\BaseWarehouseMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;


class CategoryForm extends BaseAdminComponent
{
    use BaseWarehouseMenuItems;


    public ?Category $category = null;


    public bool $isExist = false;


    public function mount(): void
    {
        if ($this->category?->exists) {
            $this->isExist = true;
        } else {
            $this->category = new Category(['is_active' => true]);
        }
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.warehouse.categories.form'), title: __('pages.categories.title'));
    }


    public function save(): void
    {
        $this->validate();

        $message = $this->isExist ? __('global.updateSuccess') : __('global.createSuccess');

        $this->category->save();

        $this->alertSuccess($message);

        $this->redirectRoute('admin.warehouse.categories.index', navigate: true);
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addMenuItem();
    }


    protected function rules(): array
    {
        $titleRule = Rule::unique('categories', 'title');

        if ($this->isExist) {
            $titleRule->ignore($this->category);
        }

        return [
            'category.title' => ['required', 'string', 'max:255', $titleRule],
            'category.description' => ['nullable', 'string', 'max:2048'],
            'category.is_active' => ['present', 'boolean'],
        ];
    }


    private function addMenuItem(): array
    {
        $sidebarMenu = collect($this->getMenuItems());
        $newMenuItem = new SubMenuItem(
            label: $this->isExist ? __('pages.categories.edit') : __('pages.categories.new'),
            type: MenuItemType::InternalLink,
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === __('pages.categories.title');
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }
}
