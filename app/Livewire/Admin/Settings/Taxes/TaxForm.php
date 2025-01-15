<?php

namespace App\Livewire\Admin\Settings\Taxes;


use App\Enums\MenuItemType;
use App\Helpers\SubMenuItem;
use App\Livewire\Admin\BaseAdminComponent;
use App\Models\Tax;
use App\Traits\Admin\Menu\BaseSettingMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class TaxForm extends BaseAdminComponent
{
    use BaseSettingMenuItems;


    public bool $isExist = false;


    public ?Tax $tax = null;


    public function mount(): void
    {
        if ($this->tax?->exists) {
            $this->isExist = true;
        } else {
            $this->tax = new Tax();
        }
    }


    public function render(): Application|View|Factory|\Illuminate\View\View
    {
        return $this->renderLayout(view('livewire.admin.settings.taxes.form'), title: __('pages.taxes.title'));
    }


    public function save(): void
    {
        $this->validate();

        $message = $this->isExist ? __('global.updateSuccess') : __('global.createSuccess');

        $this->tax->save();

        $this->alertSuccess($message);

        $this->redirectRoute('admin.settings.taxes.index', navigate: true);
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->addTaxMenuItem();
    }


    protected function rules(): array
    {
        return [
            'tax.percentage' => ['required', 'int', 'between:0,100'],
        ];
    }


    private function addTaxMenuItem(): array
    {
        $sidebarMenu = collect($this->getBaseSettingMenuItems());
        $newMenuItem = new SubMenuItem(
            label: $this->isExist ? __('pages.taxes.edit') : __('pages.taxes.new'),
            type: MenuItemType::InternalLink,
            route: $this->isExist ? 'admin.settings.taxes.show' : 'admin.settings.taxes.create',
            params: $this->isExist ? ['tax' => $this->tax->id] : [],
        );

        $sidebarMenu->firstOrFail(function (SubMenuItem $item) {
            return $item->label === __('pages.taxes.title');
        })->children[] = $newMenuItem;

        return $sidebarMenu->toArray();
    }
}
