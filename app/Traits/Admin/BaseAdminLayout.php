<?php

namespace App\Traits\Admin;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewContracts;
use Illuminate\Foundation\Application;
use Illuminate\View\View;


trait BaseAdminLayout
{
    use Alerts;


    protected bool $showSidebar = true;


    protected array $sidebarMenuItems = [];


    protected function getSidebarMenuItems(): array
    {
        return $this->sidebarMenuItems;
    }


    protected function isShowSidebar(): bool
    {
        return $this->showSidebar;
    }


    protected function renderLayout(\Illuminate\Contracts\Foundation\Application|Factory|ViewContracts $view, string $title): Application|Factory|ViewContracts|View
    {
        return $view->layout('components.layouts.base-admin', [
            'title' => $title,
            'showSidebar' => $this->isShowSidebar(),
            'sidebarMenuItems' => $this->getSidebarMenuItems(),
        ]);
    }
}
