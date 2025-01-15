<?php

namespace App\Livewire\Admin;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class BaseTilesLayout extends BaseAdminComponent
{
    protected bool $showSidebar = false;


    protected string $title = 'Default';


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(view: view('livewire.admin.base-tiles-layout', [
            'menuItems' => $this->getSidebarMenuItems(),
        ]), title: $this->getTitle());
    }


    protected function getTitle(): string
    {
        return $this->title;
    }
}
