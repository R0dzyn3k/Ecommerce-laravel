<?php

namespace App\Livewire\Admin;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class Administrators extends Settings
{
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return parent::render();
    }
}
