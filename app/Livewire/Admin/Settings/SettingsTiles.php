<?php

namespace App\Livewire\Admin\Settings;


use App\Livewire\Admin\BaseTilesLayout;
use App\Traits\Admin\Menu\BaseSettingMenuItems;


class SettingsTiles extends BaseTilesLayout
{
    use BaseSettingMenuItems;


    private bool $isSettingsTilesToMenuItemsRequired = false;


    protected function getSidebarMenuItems(): array
    {
        return $this->getBaseSettingMenuItems();
    }


    protected function getTitle(): string
    {
        return __('pages.settings.title');
    }
}
