<?php

namespace App\Traits\Admin;


use App\Enums\AlertTypes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewContracts;
use Illuminate\Foundation\Application;
use Illuminate\View\View;


trait BaseAdminLayout
{
    protected bool $showSidebar = false;


    protected array $sidebarMenuItems = [];


    protected function alertError(string $message): void
    {
        $this->showAlert(AlertTypes::ERROR, $message);
    }


    protected function alertInfo(string $message): void
    {
        $this->showAlert(AlertTypes::INFO, $message);
    }


    protected function alertSuccess(string $message): void
    {
        $this->showAlert(AlertTypes::SUCCESS, $message);
    }


    protected function alertWarning(string $message): void
    {
        $this->showAlert(AlertTypes::WARNING, $message);
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->sidebarMenuItems;
    }


    protected function renderLayout(\Illuminate\Contracts\Foundation\Application|Factory|ViewContracts $view, string $title): Application|Factory|ViewContracts|View
    {
        return $view->layout('components.layouts.base-admin', [
            'title' => $title,
            'showSidebar' => $this->showSidebar,
            'sidebarMenuItems' => $this->getSidebarMenuItems(),
        ]);
    }


    protected function showAlert(AlertTypes $type, string $message): void
    {
        $this->dispatch('show-alert', [
            'type' => $type->value,
            'message' => $message,
        ]);
    }
}
