<?php

namespace App\Livewire\Admin;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class Dashboard extends BaseAdminComponent
{
    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view: view('livewire.admin.dashboard'), title: __('pages.dashboard'));
    }
}
