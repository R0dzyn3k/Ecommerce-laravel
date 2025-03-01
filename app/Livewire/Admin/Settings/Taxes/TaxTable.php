<?php

namespace App\Livewire\Admin\Settings\Taxes;


use App\Models\Tax;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Menu\BaseSettingMenuItems;
use App\Traits\Admin\Tables\BaseDeleteAction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;


class TaxTable extends DataTableComponent
{
    use BaseSettingMenuItems, BaseAdminLayout, BaseDeleteAction;


    public $model = Tax::class;


    public string $tableName = 'taxes';


    public function bulkActions(): array
    {
        return [
            'delete' => __('global.delete'),
        ];
    }


    public function columns(): array
    {
        return [
            Column::make(__('global.id'), 'id')->searchable()->sortable(),
            Column::make(__('global.title'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(__('pages.taxes.percentage'), 'percentage')
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
            ->setTableRowUrl(static fn(Tax $model) => route('admin.settings.taxes.show', $model))
            ->setConfigurableAreas(['before-wrapper' => 'livewire.admin.components.create-model-button'])
            ->setTableRowUrlTarget(static fn() => 'navigate');
    }


    public function create(): void
    {
        $this->redirectRoute('admin.settings.taxes.create', navigate: true);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(parent::render(), title: __('pages.taxes.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getMenuItems();
    }
}
