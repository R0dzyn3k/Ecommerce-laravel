<?php

namespace App\Livewire\Admin\Warehouse\Products;


use App\Models\Product;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Menu\BaseWarehouseMenuItems;
use App\Traits\Admin\Tables\{BaseActivateAction, BaseDeactivateAction, BaseDeleteAction};
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\{Column, Columns\BooleanColumn, Columns\DateColumn};


class ProductTable extends DataTableComponent
{
    use BaseWarehouseMenuItems, BaseAdminLayout, BaseDeleteAction, BaseDeactivateAction, BaseActivateAction;


    public $model = Product::class;


    public string $tableName = 'products';


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
            Column::make(__('pages.products.stock'), 'stock')
                ->sortable(),
            Column::make(__('pages.products.ean'), 'ean')
                ->searchable()
                ->sortable()
                ->sortable(),
            Column::make(__('pages.products.sku'), 'sku')
                ->searchable()
                ->sortable(),
            Column::make(__('pages.products.mpn'), 'mpn')
                ->searchable()
                ->sortable(),
            Column::make(__('pages.products.price'), 'price_gross')
                ->sortable(),
            Column::make(__('pages.products.discountPrice'), 'discount_price')
                ->sortable(),
            Column::make(__('pages.products.tax'), 'tax_id')
                ->format(fn($value, Product $model) => $model->tax->name)
                ->searchable()
                ->sortable(),
            Column::make(__('pages.products.category'), 'category_id')
                ->format(fn($value, Product $model) => $model->category?->title)
                ->searchable()
                ->sortable(),
            DateColumn::make(__('global.updated_at'), 'updated_at')
                ->outputFormat('Y-m-d H:i:s')
                ->sortable(),
            DateColumn::make(__('global.created_at'), 'created_at')
                ->outputFormat('Y-m-d H:i:s')
                ->sortable(),
        ];
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setTableRowUrl(static fn(Product $model) => route('admin.warehouse.products.show', $model))
            ->setConfigurableAreas(['before-wrapper' => 'livewire.admin.components.create-model-button'])
            ->setTableRowUrlTarget(static fn() => 'navigate');
    }


    public function create(): void
    {
        $this->redirectRoute('admin.warehouse.products.create', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(parent::render(), title: __('pages.products.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getMenuItems();
    }
}
