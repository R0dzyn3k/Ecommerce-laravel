<?php

namespace App\Livewire\Web\Profile;


use App\Models\Customer;
use App\Traits\Admin\Alerts;
use App\Traits\Web\Menu\ProfileMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Profile extends Component
{
    use Alerts, ProfileMenuItems;


    public Customer $profile;


    public function mount(): void
    {
        $this->profile = Auth::guard('web')->user();
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return view('livewire.web.profile.edit')->layout('components.layouts.profile-layout', [
            'title' => __('pages.profile.title'),
            'menuItems' => $this->getProfileMenuItems(),
        ]);
    }


    public function save(): void
    {
        $this->validate();

        if ($this->profile->isDirty('email')) {
            $this->profile->email_verified_at = null;
        }

        $this->profile->save();

        $this->alertSuccess(__('global.updateSuccess'));
    }


    protected function rules(): array
    {
        return [
            'profile.firstname' => ['required', 'string', 'max:30'],
            'profile.lastname' => ['required', 'string', 'max:30'],
            'profile.email' => ['required', 'email', 'max:255', Rule::unique(Customer::class, 'email')->ignore($this->profile)],
            'profile.phone' => ['sometimes', 'nullable', 'string', 'max:20'],
        ];
    }
}
