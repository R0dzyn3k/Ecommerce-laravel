<?php

namespace App\Livewire\Admin\Profile;


use App\Models\Admin;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ProfileEdit extends BaseProfileComponent
{

    public Admin $profile;


    public function mount(): void
    {
        $this->profile = Auth::guard('admin')->user();
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view: view('livewire.admin.profile.profile'), title: __('pages.profile.title'));
    }


    public function save(): void
    {
        $this->validate();

        $this->profile->save();

        $this->alertSuccess(__('global.updateSuccess'));
    }


    protected function rules(): array
    {
        return [
            'profile.firstname' => ['required', 'string', 'max:30'],
            'profile.lastname' => ['required', 'string', 'max:30'],
            'profile.email' => ['required', 'email', 'max:255', Rule::unique(Admin::class, 'email')->ignore($this->profile)],
            'profile.phone' => ['required', 'string', 'max:20'],
        ];
    }
}
