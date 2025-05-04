<?php

namespace App\Livewire\Admin\Settings\ShippingMethods;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\ShippingMethod;
use App\Services\ShippingManager;
use App\Traits\Admin\Menu\BaseSettingMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;


class ShippingMethodForm extends BaseAdminComponent
{
    use BaseSettingMenuItems;


    public bool $isExist = false;


    public ?ShippingMethod $method = null;


    public function mount(): void
    {
        if ($this->method?->exists) {
            $this->isExist = true;
        } else {
            $this->method = new ShippingMethod();
        }

    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.settings.shipping-methods.form', [
            'shippingManager' => app(ShippingManager::class),
        ]), title: 'Metody dostawy');
    }


    public function save(): void
    {
        $this->validate();

        $message = $this->isExist ? __('global.updateSuccess') : __('global.createSuccess');

        $this->method->save();

        $this->alertSuccess($message);

        $this->redirectRoute('admin.settings.shipping-methods.index', navigate: true);
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addMenuItem();
    }


    protected function rules(): array
    {
        $shippingManager = app(ShippingManager::class);

        return [
            'method.is_active' => ['present', 'bool'],
            'method.name' => ['required', 'string', 'max:255'],
            'method.driver' => ['required', 'string', Rule::in($shippingManager->getDrivers()->keys())],
            'method.cost' => ['required', 'numeric', 'min:0', 'max:999999'],
        ];
    }


    private function addMenuItem(): array
    {
        $sidebarMenu = collect($this->getMenuItems());
        $newMenuItem = new SubMenuItem(
            label: $this->isExist ? 'Edycja dostawy' : 'Nowa metoda dostawy',
            type: MenuItemType::InternalLink,
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === 'Metody dostawy';
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }
}
