<?php

namespace App\Livewire\Admin\Components;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;


class SubMenuItem extends Component
{
    public string $action;


    public string $class;


    public bool $isCurrentPage;


    public ?string $label;


    public ?string $title;


    public function mount(
        string  $action,
        ?string $label = null,
        ?string $title = null,
        string  $class = ''
    ): void {
        $this->action = $action;
        $this->label = $label;
        $this->title = $title ?? $label;
        $this->class = $class;

        $this->isCurrentPage = url()->current() === $this->action;
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.admin.components.sub-menu-item');
    }
}
