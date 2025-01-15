<?php

namespace App\Livewire\Admin\Warehouse\Brands;


use App\Models\Brand;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Menu\BaseWarehouseMenuItems;
use App\Traits\Admin\Tables\{BaseActivateAction, BaseDeactivateAction, BaseDeleteAction};
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\{Column, Columns\BooleanColumn, Columns\DateColumn};


class BrandTable extends DataTableComponent
{
    use BaseWarehouseMenuItems, BaseAdminLayout, BaseDeleteAction, BaseDeactivateAction, BaseActivateAction;


    public $model = Brand::class;


    public string $tableName = 'brands';


    public function bulkActions(): array
    {
        return [
            'activate' => __('pages.customers.activate'),
            'deactivate' => __('pages.customers.deactivate'),
            'delete' => __('global.delete'),
        ];
    }


    public function columns(): array
    {
        return [
            Column::make(__('global.id'), 'id')->searchable()->sortable(),
            Column::make(__('global.title'), 'title')
                ->searchable()
                ->sortable(),
            BooleanColumn::make(__('global.is_active'), 'is_active')
                ->sortable(),
            DateColumn::make(__('global.created_at'), 'created_at')
                ->outputFormat('Y-m-d H:i:s')
                ->sortable(),
            DateColumn::make(__('global.updated_at'), 'updated_at')
                ->outputFormat('Y-m-d H:i:s')
                ->sortable()
                ->isHidden(),
        ];
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setTableRowUrl(static fn(Brand $model) => route('admin.warehouse.brands.show', $model))
            ->setConfigurableAreas(['before-wrapper' => 'livewire.admin.components.create-model-button'])
            ->setTableRowUrlTarget(static fn() => 'navigate');
    }


    public function create(): void
    {
        $this->redirectRoute('admin.warehouse.brands.create', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(parent::render(), title: __('pages.brands.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getBaseWarehouseMenuItems();
    }
}
