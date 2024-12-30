<?php

namespace App\Livewire\Admin\Profile;


use App\Livewire\Admin\BaseAdminComponent;


class BaseProfileComponent extends BaseAdminComponent
{
    protected bool $showSidebar = true;


    protected function getSidebarMenuItems(): array
    {
        return [
            [
                'label' => __('pages.profile.title'),
                'title' => __('pages.profile.subTitle'),
                'action' => route('admin.profile.edit'),
            ], [
                'label' => __('pages.profileSecurity.title'),
                'title' => __('pages.profile.subTitle'),
                'action' => route('admin.profile.security'),
            ],
        ];
    }
}
