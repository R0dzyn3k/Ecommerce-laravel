<?php

namespace App\Traits\Admin\Menu;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;


trait BaseWarehouseMenuItems
{
    private function getBaseWarehouseMenuItems(): array
    {
        $menuItems = [
            new SubMenuItem(
                label: __('pages.products.title'),
                type: MenuItemType::InternalLink,
                icon: 'heroicon-c-circle-stack',
                route: 'admin.warehouse.categories.index',
            ),
            new SubMenuItem(
                label: __('pages.categories.title'),
                type: MenuItemType::InternalLink,
                icon: 'heroicon-c-circle-stack',
                route: 'admin.warehouse.categories.index',
            ),
            new SubMenuItem(
                label: __('pages.brands.title'),
                type: MenuItemType::InternalLink,
                icon: 'heroicon-m-inbox-stack',
                route: 'admin.warehouse.brands.index',
            ),
        ];

        return $this->isWarehouseTilesToMenuItemsRequired ?? true
            ? array_merge([$this->getWarehouseTilesMenuItem()], $menuItems)
            : $menuItems;
    }


    private function getWarehouseTilesMenuItem(): SubMenuItem
    {
        return new SubMenuItem(
            label: __('pages.warehouse.title'),
            type: MenuItemType::InternalLink,
            route: 'admin.warehouse.index',
        );
    }
}
