<?php

namespace App\Livewire\Admin\Sales;


use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\{Column, Columns\DateColumn};


class OrderItemTable extends DataTableComponent
{
    public $model = OrderItem::class;


    public int $modelId;


    public string $tableName = 'order-items';


    public function columns(): array
    {
        return [
            Column::make(__('global.id'), 'id')->searchable()->sortable(),
            Column::make(__('global.title'), 'product_title')
                ->searchable()
                ->sortable(),
            Column::make(__('pages.orderItems.amount'), 'amount')
                ->sortable(),
            Column::make(__('pages.orderItems.priceUnit'), 'unit_price_gross')
                ->sortable()
                ->format(fn(float $value) => round($value, 2)),
            Column::make(__('pages.orderItems.priceSum'), 'total_price_gross')
                ->sortable()
                ->format(fn(float $value) => round($value, 2)),
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
        $this->setPrimaryKey('id')->setDefaultSort('id', 'desc');
    }


    public function setBuilder(Builder $builder): void
    {
        $this->builder = $builder->where('order_id', $this->modelId);
    }
}
