<?php

namespace App\Livewire\Admin\Components;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;


class SubMenu extends Component
{
    public array $menuItems = [];


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.admin.sub-menu', [
            'menuItems' => $this->menuItems,
        ]);
    }
}
