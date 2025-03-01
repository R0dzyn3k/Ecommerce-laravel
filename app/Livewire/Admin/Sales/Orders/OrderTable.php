<?php

namespace App\Livewire\Admin\Sales\Orders;


use App\Enums\OrderStatus;
use App\Models\Order;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Menu\BaseSalesMenuItems;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\{Column, Columns\BooleanColumn, Columns\DateColumn};


class OrderTable extends DataTableComponent
{
    use BaseSalesMenuItems, BaseAdminLayout;


    public $model = Order::class;


    public string $tableName = 'orders';


    public function columns(): array
    {
        return [
            Column::make(__('global.id'), 'id')->searchable()->sortable(),
            Column::make(__('pages.orders.customer'), 'customer_id')
                ->format(fn(?int $value, Order $order) => $value ? $order->customer->name . " (ID: $order->id)" : __('global.guest'))
                ->searchable()
                ->sortable(),
            Column::make(__('pages.orders.email'), 'email')
                ->deselected()
                ->searchable()
                ->sortable(),
            BooleanColumn::make(__('pages.orders.isCompleted'), 'status')
                ->setCallback(fn(OrderStatus $status) => $status === OrderStatus::COMPLETED)
                ->sortable(),
            Column::make(__('pages.orders.status'), 'status')
                ->sortable(),
            Column::make(__('pages.orders.totalGross'), 'total_gross')
                ->sortable(),
            Column::make(__('pages.orders.itemsCount'), 'id')
                ->format(fn($value, Order $model) => $model->items->count())
                ->sortable(),
            DateColumn::make(__('pages.orders.orderedAt'), 'ordered_at')
                ->outputFormat('Y-m-d H:i:s')
                ->sortable(),
            DateColumn::make(__('pages.orders.realizationAt'), 'realization_at')
                ->outputFormat('Y-m-d H:i:s')
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
            ->setTableRowUrl(static fn(Order $model) => route('admin.sales.orders.show', $model))
            ->setTableRowUrlTarget(static fn() => 'navigate');
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(parent::render(), title: __('pages.orders.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getMenuItems();
    }
}
