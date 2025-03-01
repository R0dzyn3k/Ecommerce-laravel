<?php

namespace App\Livewire\Admin\Sales\Carts;


use App\Models\Cart;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Menu\BaseSalesMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\{Column, Columns\DateColumn};


class CartTable extends DataTableComponent
{
    use BaseSalesMenuItems, BaseAdminLayout;


    public $model = Cart::class;


    public string $tableName = 'carts';


    public function columns(): array
    {
        return [
            Column::make(__('global.id'), 'id')->searchable()->sortable(),
            Column::make(__('pages.orders.customer'), 'customer_id')
                ->format(fn(?int $value) => $value ?? __('global.guest'))
                ->searchable()
                ->sortable(),
            Column::make(__('pages.orders.itemsCount'), 'id')
                ->format(fn($value, Cart $model) => $model->items->count())
                ->sortable(),
            Column::make(__('pages.orders.itemsGross'), 'items_gross')
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
            ->setTableRowUrl(static fn(Cart $model) => route('admin.sales.carts.show', $model))
            ->setTableRowUrlTarget(static fn() => 'navigate');
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(parent::render(), title: __('pages.carts.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getMenuItems();
    }
}
