<?php

namespace App\Livewire\Web;


use App\Models\Blog;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Livewire\Component;


class BlogList extends Component
{
    /**
     * @var Collection<Blog>
     */
    public Collection $blogList;


    public function mount(): void
    {
        $this->blogList = Blog::query()->orderBy('created_at', 'desc')->limit(3)->get();
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.web.blog-list', [
            'blogList' => $this->blogList,
        ]);
    }
}

