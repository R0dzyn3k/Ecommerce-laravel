<?php

namespace App\Livewire\Admin\Warehouse\Categories;


use App\Models\Category;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Menu\BaseWarehouseMenuItems;
use App\Traits\Admin\Tables\{BaseActivateAction, BaseDeactivateAction, BaseDeleteAction};
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\{Column, Columns\BooleanColumn, Columns\DateColumn};


class CategoryTable extends DataTableComponent
{
    use BaseWarehouseMenuItems, BaseAdminLayout, BaseDeleteAction, BaseDeactivateAction, BaseActivateAction;


    public $model = Category::class;


    public string $tableName = 'categories';


    public function bulkActions(): array
    {
        return [
            'activate' => __('global.activate'),
            'deactivate' => __('global.deactivate'),
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
                ->sortable(),
        ];
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setTableRowUrl(static fn(Category $model) => route('admin.warehouse.categories.show', $model))
            ->setConfigurableAreas(['before-wrapper' => 'livewire.admin.components.create-model-button'])
            ->setTableRowUrlTarget(static fn() => 'navigate');
    }


    public function create(): void
    {
        $this->redirectRoute('admin.warehouse.categories.create', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(parent::render(), title: __('pages.categories.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getBaseWarehouseMenuItems();
    }
}
