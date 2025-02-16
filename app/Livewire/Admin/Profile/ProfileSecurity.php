<?php

namespace App\Livewire\Admin\Profile;


use App\Models\Admin;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


class ProfileSecurity extends BaseProfileComponent
{
    public string $newPassword = '';


    public string $newPassword_confirmation = '';


    public string $password = '';


    public Admin $profile;


    public int $wrongPasswordCounter;


    public function mount(): void
    {
        $this->profile = Auth::guard('admin')->user();
        $this->wrongPasswordCounter = 0;
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view: view('livewire.admin.profile.security'), title: __('pages.profile.title'));
    }


    public function save(): void
    {
        if ($this->wrongPasswordCounter >= 5) {
            Auth::logout();

            return;
        }


        try {
            $this->validate();
        } catch (ValidationException $e) {
            $this->resetPasswordFields();

            if (isset($e->errors()['password'])) {
                $this->wrongPasswordCounter++;
            }

            throw $e;
        }

        $this->wrongPasswordCounter = 0;

        $this->profile->update([
            'password' => $this->newPassword,
        ]);

        $this->alertSuccess(__('global.updateSuccess'));
        $this->resetPasswordFields();
    }


    protected function rules(): array
    {
        return [
            'password' => ['required', 'nullable', 'string', 'current_password:admin'],
            'newPassword' => ['required', 'nullable', 'string', Password::default(), 'confirmed', 'different:password'],
            'newPassword_confirmation' => ['required', 'nullable', 'string'],
        ];
    }


    private function resetPasswordFields(): void
    {
        $this->password = '';
        $this->newPassword = '';
        $this->newPassword_confirmation = '';
    }
}
