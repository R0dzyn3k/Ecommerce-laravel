<?php

namespace App\Traits\Web\Menu;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;


trait ProfileMenuItems
{
    private function getProfileMenuItems(): array
    {
        return [
            new SubMenuItem(
                label: __('pages.profile.title'),
                type: MenuItemType::InternalLink,
                route: 'web.profile.edit',
            ),
            new SubMenuItem(
                label: __('pages.profileSecurity.title'),
                type: MenuItemType::InternalLink,
                route: 'web.profile.security',
            ),
        ];
    }
}
