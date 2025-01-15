<?php

namespace App\Livewire\Admin\Settings\Administrators;


use App\Enums\MenuItemType;
use App\Enums\UserType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\Admin;
use App\Models\User;
use App\Traits\Admin\Menu\BaseSettingMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class AdministratorForm extends BaseAdminComponent
{
    use BaseSettingMenuItems;


    public ?User $admin = null;


    public bool $isExist = false;


    public string $password = '';


    public string $password_confirmation = '';


    public function mount(): void
    {
        if ($this->admin?->exists) {
            $this->isExist = true;
        } else {
            $this->admin = new Admin();
        }
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.settings.administrators.form'), title: __('pages.administrators.title'));
    }


    public function save(): void
    {
        try {
            $this->validate();
        } catch (ValidationException $e) {
            $this->resetPasswordFields();

            throw $e;
        }

        $message = $this->isExist ? __('global.updateSuccess') : __('global.createSuccess');

        if (! $this->isExist && empty($this->password)) {
            $this->password = Str::password();
        }

        if (! empty($this->password)) {
            $this->admin->fill([
                'password' => $this->password,
            ]);
        }

        $this->admin->role = UserType::ADMIN;

        $this->admin->save();

        $this->alertSuccess($message);

        $this->redirectRoute('admin.settings.administrators.index', navigate: true);
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addAdministratorMenuItem();
    }


    protected function rules(): array
    {
        return [
            'admin.firstname' => ['required', 'string', 'max:30'],
            'admin.lastname' => ['required', 'string', 'max:30'],
            'admin.email' => ['required', 'email', 'max:255', Rule::unique(Admin::class, 'email')->ignore($this->admin)],
            'admin.phone' => ['required', 'string', 'max:20'],
            'password' => ['sometimes', 'nullable', 'string', 'min:3', 'confirmed'],
            'password_confirmation' => ['sometimes', 'nullable', 'required_with:password', 'string', 'same:password'],
        ];
    }


    private function addAdministratorMenuItem(): array
    {
        $sidebarMenu = collect($this->getBaseSettingMenuItems());
        $newMenuItem = new SubMenuItem(
            label: $this->isExist ? __('pages.administrators.edit') : __('pages.administrators.new'),
            type: MenuItemType::InternalLink,
            route: $this->isExist ? 'admin.settings.administrators.show' : 'admin.settings.administrators.create',
            params: $this->isExist ? ['admin' => $this->admin->id] : [],
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === __('pages.administrators.title');
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }


    private function resetPasswordFields(): void
    {
        $this->password = '';
        $this->password_confirmation = '';
    }
}
