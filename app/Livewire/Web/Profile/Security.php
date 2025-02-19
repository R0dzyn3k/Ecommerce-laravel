<?php

namespace App\Livewire\Web\Profile;


use App\Models\Customer;
use App\Traits\Admin\Alerts;
use App\Traits\Web\Menu\ProfileMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class Security extends Component
{
    use Alerts, ProfileMenuItems;


    public string $newPassword = '';


    public string $newPassword_confirmation = '';


    public string $password = '';


    public Customer $profile;


    public int $wrongPasswordCounter;


    public function mount(): void
    {
        $profile = Auth::guard('web')->user();

        if ($profile) {
            $this->profile = $profile;
            $this->wrongPasswordCounter = 0;
        } else {
            $this->redirectRoute('web.login', navigate: true);
        }
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return view('livewire.web.profile.security')->layout('components.layouts.profile-layout', [
            'title' => __('pages.profileSecurity.title'),
            'menuItems' => $this->getProfileMenuItems(),
        ]);
    }


    public function save(): void
    {
        if ($this->wrongPasswordCounter >= 5) {
            Auth::guard('web')->logout();

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
            'password' => ['required', 'nullable', 'string', 'current_password:web'],
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
