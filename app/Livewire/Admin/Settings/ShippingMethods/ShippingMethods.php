<?php

namespace App\Livewire\Admin\Settings\ShippingMethods;


use App\Models\ShippingMethod;
use App\Services\ShippingManager;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Menu\BaseSettingMenuItems;
use App\Traits\Admin\Tables\BaseDeleteAction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;


class ShippingMethods extends DataTableComponent
{
    use BaseSettingMenuItems, BaseAdminLayout, BaseDeleteAction;


    public $model = ShippingMethod::class;


    public string $tableName = 'shipping-methods';


    public function bulkActions(): array
    {
        return [
            'delete' => __('global.delete'),
        ];
    }


    public function columns(): array
    {
        $shippingManager = app(ShippingManager::class);

        return [
            Column::make(__('global.id'), 'id')->searchable()->sortable(),
            Column::make(__('global.title'), 'name')
                ->searchable()
                ->sortable(),
            Column::make('Sterownik', 'driver')
                ->format(fn($value) => $shippingManager->getDriver($value)->getLabel())
                ->searchable()
                ->sortable(),
            BooleanColumn::make(__('global.is_active'), 'is_active')
                ->sortable(),
            Column::make('Koszt', 'cost')
                ->format(fn($value) => $value . ' zł')
                ->searchable()
                ->sortable(),
            DateColumn::make(__('global.updated_at'), 'updated_at')
                ->outputFormat('Y-m-d H:i:s')
                ->sortable()
                ->isHidden(),
            DateColumn::make(__('global.created_at'), 'created_at')
                ->outputFormat('Y-m-d H:i:s')
                ->sortable(),
        ];
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setTableRowUrl(static fn(ShippingMethod $model) => route('admin.settings.shipping-methods.show', $model))
            ->setConfigurableAreas(['before-wrapper' => 'livewire.admin.components.create-model-button'])
            ->setTableRowUrlTarget(static fn() => 'navigate');
    }


    public function create(): void
    {
        $this->redirectRoute('admin.settings.shipping-methods.create', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(parent::render(), title: 'Metody płatności');
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getMenuItems();
    }
}
