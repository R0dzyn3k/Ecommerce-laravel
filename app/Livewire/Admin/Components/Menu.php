<?php

namespace App\Livewire\Admin\Components;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;


class Menu extends Component
{
    public array $menuItems = [];


    public function mount(): void
    {
        $this->menuItems = [
            [
                'action' => route('admin.sales.index'),
                'icon' => 'sales',
                'label' => __('pages.sales.title'),
                'title' => __('pages.sales.title'),
            ], [
                'action' => route('admin.warehouse.index'),
                'icon' => 'warehouse',
                'label' => __('pages.warehouse.title'),
                'title' => __('pages.warehouse.title'),
            ], [
                'action' => route('admin.discounts'),
                'icon' => 'discounts',
                'label' => __('pages.discounts'),
                'title' => __('pages.discounts'),
            ], [
                'action' => route('admin.customers.index'),
                'icon' => 'customers',
                'label' => __('pages.customers.title'),
                'title' => __('pages.customers.title'),
            ],
        ];
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.admin.menu', [
            'menuItems' => $this->menuItems,
        ]);
    }
}
