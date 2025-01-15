<?php

namespace App\Traits\Admin\Menu;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;


trait BaseSettingMenuItems
{
    private function getBaseSettingMenuItems(): array
    {
        $menuItems = [
            new SubMenuItem(
                label: __('pages.administrators.title'),
                type: MenuItemType::InternalLink,
                icon: 'heroicon-c-user',
                route: 'admin.settings.administrators.index',
            ),
            new SubMenuItem(
                label: __('pages.taxes.title'),
                type: MenuItemType::InternalLink,
                icon: 'heroicon-c-currency-euro',
                route: 'admin.settings.taxes.index',
            ),
        ];

        return $this->isSettingsTilesToMenuItemsRequired ?? true
            ? array_merge([$this->getSettingsTilesMenuItem()], $menuItems)
            : $menuItems;
    }


    private function getSettingsTilesMenuItem(): SubMenuItem
    {
        return new SubMenuItem(
            label: __('pages.settings.title'),
            type: MenuItemType::InternalLink,
            route: 'admin.settings.index',
        );
    }
}
