<?php

namespace App\Livewire\Web;


use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;


class SearchBar extends Component
{
    public Collection $results;


    public string $search = '';


    public bool $showResults = false;


    #[On('closeSearchResults')]
    public function closeSearchResults(): void
    {
        $this->showResults = false;
    }


    public function mount(): void
    {
        $this->results = collect();
    }


    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        return view('livewire.web.search-bar');
    }


    public function updatedSearch(): void
    {
        if (strlen($this->search) < 3) {
            $this->results = collect();
            $this->showResults = false;

            return;
        }

        $this->results = Product::query()
            ->where('is_active', true)
            ->where('title', 'like', "%$this->search%")
            ->take(5)
            ->get();

        $this->showResults = true;
    }
}
