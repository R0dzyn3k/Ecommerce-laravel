<?php

namespace App\Livewire\Admin\Settings\BillingMethods;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\BillingMethod;
use App\Services\BillingManager;
use App\Traits\Admin\Menu\BaseSettingMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;


class BillingMethodForm extends BaseAdminComponent
{
    use BaseSettingMenuItems;


    public bool $isExist = false;


    public ?BillingMethod $method = null;


    public function mount(): void
    {
        if ($this->method?->exists) {
            $this->isExist = true;
        } else {
            $this->method = new BillingMethod();
        }

    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.settings.billing-methods.form', [
            'billingManager' => app(BillingManager::class),
        ]), title: 'Metoda płatności');
    }


    public function save(): void
    {
        $this->validate();

        $message = $this->isExist ? __('global.updateSuccess') : __('global.createSuccess');

        $this->method->save();

        $this->alertSuccess($message);

        $this->redirectRoute('admin.settings.billing-methods.index', navigate: true);
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addMenuItem();
    }


    protected function rules(): array
    {
        $billingManager = app(BillingManager::class);

        return [
            'method.is_active' => ['present', 'bool'],
            'method.name' => ['required', 'string', 'max:255'],
            'method.driver' => ['required', 'string', Rule::in($billingManager->getDrivers()->keys())],
        ];
    }


    private function addMenuItem(): array
    {
        $sidebarMenu = collect($this->getMenuItems());
        $newMenuItem = new SubMenuItem(
            label: $this->isExist ? 'Edycja płatności' : 'Nowa płatność',
            type: MenuItemType::InternalLink,
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === 'Metody płatności';
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }
}
