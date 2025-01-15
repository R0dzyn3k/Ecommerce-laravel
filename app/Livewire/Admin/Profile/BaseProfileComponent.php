<?php

namespace App\Livewire\Admin\Profile;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;


class BaseProfileComponent extends BaseAdminComponent
{
    protected bool $showSidebar = true;


    protected function getSidebarMenuItems(): array
    {
        return [
            new SubMenuItem(
                label: __('pages.profile.title'),
                type: MenuItemType::InternalLink,
                route: 'admin.profile.edit',
                title: __('pages.profile.subTitle'),
            ),
            new SubMenuItem(
                label: __('pages.profileSecurity.title'),
                type: MenuItemType::InternalLink,
                route: 'admin.profile.security',
                title: __('pages.profile.subTitle'),
            ),
        ];
    }
}
