<?php

namespace App\Livewire\Web;


use Livewire\Component;


class SearchBar extends Component
{
    public string $search = '';


    public function render()
    {
        return view('livewire.web.search-bar');
    }


    public function updatedSearch()
    {
        $this->dispatch('search', $this->search);
    }
}

