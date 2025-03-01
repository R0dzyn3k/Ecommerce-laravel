<?php

namespace App\Traits\Admin\Menu;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;


trait BaseSettingMenuItems
{
    private function getMenuItems(): array
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
            new SubMenuItem(
                label: __('pages.newsletter.title'),
                type: MenuItemType::InternalLink,
                icon: 'heroicon-c-numbered-list',
                route: 'admin.settings.newsletter.index',
            ),
        ];

        return $this->addBaseTileToMenuItems ?? true
            ? array_merge([$this->getTilesMenuItem()], $menuItems)
            : $menuItems;
    }


    private function getTilesMenuItem(): SubMenuItem
    {
        return new SubMenuItem(
            label: __('pages.settings.title'),
            type: MenuItemType::InternalLink,
            route: 'admin.settings.index',
        );
    }
}
