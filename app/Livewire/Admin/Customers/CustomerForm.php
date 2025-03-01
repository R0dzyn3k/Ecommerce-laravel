<?php

namespace App\Livewire\Admin\Customers;


use App\Enums\MenuItemType;
use App\Enums\UserType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


class CustomerForm extends BaseAdminComponent
{
    public ?User $customer = null;


    public bool $isExist = false;


    public string $password = '';


    public string $password_confirmation = '';


    public function mount(): void
    {
        if ($this->customer?->exists) {
            $this->isExist = true;
        } else {
            $this->customer = new Customer();
        }
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.customers.form'), title: __('pages.customers.title'));
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
            $this->customer->fill([
                'password' => $this->password,
            ]);
        }

        $this->customer->role = UserType::CUSTOMER;
        $this->customer->save();

        $this->alertSuccess($message);

        $this->redirectRoute('admin.customers.index', navigate: true);
    }


    protected function getSidebarMenuItems(): array
    {
        return [
            new SubMenuItem(
                label: __('pages.customers.list'),
                type: MenuItemType::InternalLink,
                route: 'admin.customers.index'
            ),
            new SubMenuItem(
                label: $this->isExist ? __('pages.customers.edit') : __('pages.customers.new'),
                type: MenuItemType::InternalLink,
            ),
        ];
    }


    protected function rules(): array
    {
        return [
            'customer.firstname' => ['required', 'string', 'max:30'],
            'customer.lastname' => ['required', 'string', 'max:30'],
            'customer.email' => ['required', 'email', 'max:255', Rule::unique(Customer::class, 'email')->ignore($this->customer)],
            'customer.phone' => ['nullable', 'string', 'max:20'],
            'password' => ['sometimes', 'nullable', 'string', Password::default(), 'confirmed'],
            'password_confirmation' => ['sometimes', 'nullable', 'required_with:password', 'string', 'same:password'],
        ];
    }


    private function resetPasswordFields(): void
    {
        $this->password = '';
        $this->password_confirmation = '';
    }
}
