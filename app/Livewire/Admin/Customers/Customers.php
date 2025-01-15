<?php

namespace App\Livewire\Admin\Customers;


use App\Livewire\Admin\BaseAdminComponent;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class Customers extends BaseAdminComponent
{
    protected bool $showSidebar = false;


    public function create(): void
    {
        $this->redirectRoute('admin.customers.create', navigate: true);
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.customers.index'), title: __('pages.customers.title'));
    }
}
