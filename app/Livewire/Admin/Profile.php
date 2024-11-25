<?php

namespace App\Livewire\Admin;


use App\Models\Admin;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class Profile extends BaseAdminComponent
{
    public string $email;


    public string $name;


    public string $newPassword;


    public string $newPassword_confirmation;


    public string $password;


    public Admin $profile;


    public function mount(): void
    {
        $profile = Auth::guard('admin')->user();

        $this->profile = $profile;
        $this->name = $profile->name;
        $this->email = $profile->email;
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderWithLayout(view('livewire.admin.profile'), __('pages.profile.title'));
    }


    public function update(): void
    {
        $validatedData = $this->validate();

        if ($validatedData['password']) {
            $this->profile->fill(['password' => $this->newPassword]);
        }

        $this->profile->fill([
            'name' => $this->name,
            'email' => $this->email,
        ])->save();

        $this->alertSuccess(__('global.updateSuccess'));
    }


    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(Admin::class, 'email')->ignore($this->profile)],
            'password' => ['sometimes', 'nullable', 'string', 'current_password:admin'],
            'newPassword' => ['required_with:password', 'nullable', 'string', 'min:3', 'confirmed', 'different:password'],
            'newPassword_confirmation' => ['required_with:password', 'nullable', 'string'],
        ];
    }
}
