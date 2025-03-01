<?php

namespace App\Livewire\Admin\Sales\Carts;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\Cart;
use App\Traits\Admin\Menu\BaseSalesMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class CartForm extends BaseAdminComponent
{
    use BaseSalesMenuItems;


    public Cart $cart;


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.sales.carts.form'), title: __('pages.carts.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addMenuItem();
    }


    private function addMenuItem(): array
    {
        $sidebarMenu = collect($this->getMenuItems());
        $newMenuItem = new SubMenuItem(
            label: __('pages.carts.show'),
            type: MenuItemType::InternalLink,
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === __('pages.carts.title');
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }
}
