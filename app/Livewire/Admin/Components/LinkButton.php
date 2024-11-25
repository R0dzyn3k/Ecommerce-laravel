<?php

namespace App\Livewire\Admin\Components;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;


class LinkButton extends Component
{
    public string $action;


    public bool $borderTop;


    public string $class;


    public ?string $icon;


    public bool $isCurrentPage;


    public ?string $label;


    public ?string $title;


    public function mount(
        string $action,
        string $icon = null,
        string $label = null,
        string $title = null,
        bool   $borderTop = false,
        string $class = ''
    ): void {
        $this->action = $action;
        $this->icon = $icon;
        $this->label = $label;
        $this->title = $title ?? $label;
        $this->borderTop = $borderTop;
        $this->class = $class;

        $this->isCurrentPage = str_contains(url()->current(), $this->action);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.admin.components.link-button');
    }
}
