<?php

namespace App\Livewire\Admin;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class Settings extends BaseAdminComponent
{
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(view: view('livewire.admin.settings'), title: __('pages.settings.title'));
    }
}
