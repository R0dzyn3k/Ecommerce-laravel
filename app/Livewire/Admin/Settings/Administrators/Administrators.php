<?php

namespace App\Livewire\Admin\Settings\Administrators;


use App\Livewire\Admin\BaseAdminComponent;
use App\Traits\Admin\Menu\BaseSettingMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class Administrators extends BaseAdminComponent
{
    use BaseSettingMenuItems;


    public function create(): void
    {
        $this->redirectRoute('admin.settings.administrators.create', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.settings.administrators.index'), title: __('pages.administrators.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getBaseSettingMenuItems();
    }
}
