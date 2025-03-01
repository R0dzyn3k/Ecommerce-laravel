<?php

namespace App\Traits\Admin\Menu;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;


trait BaseSalesMenuItems
{
    private function getMenuItems(): array
    {
        $menuItems = [
            new SubMenuItem(
                label: __('pages.orders.title'),
                type: MenuItemType::InternalLink,
                icon: 'heroicon-s-archive-box',
                route: 'admin.sales.orders.index',
            ),
            new SubMenuItem(
                label: __('pages.carts.title'),
                type: MenuItemType::InternalLink,
                icon: 'heroicon-s-archive-box',
                route: 'admin.sales.carts.index',
            ),
        ];

        return $this->addBaseTileToMenuItems ?? true
            ? array_merge([$this->getTilesMenuItem()], $menuItems)
            : $menuItems;
    }


    private function getTilesMenuItem(): SubMenuItem
    {
        return new SubMenuItem(
            label: __('pages.sales.title'),
            type: MenuItemType::InternalLink,
            route: 'admin.sales.index',
        );
    }
}
