<?php

namespace App\Livewire\Admin\Settings\BillingMethods;


use App\Models\BillingMethod;
use App\Services\BillingManager;
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


class BillingMethods extends DataTableComponent
{
    use BaseSettingMenuItems, BaseAdminLayout, BaseDeleteAction;


    public $model = BillingMethod::class;


    public string $tableName = 'billing-methods';


    public function bulkActions(): array
    {
        return [
            'delete' => __('global.delete'),
        ];
    }


    public function columns(): array
    {
        $billingManager = app(BillingManager::class);

        return [
            Column::make(__('global.id'), 'id')->searchable()->sortable(),
            Column::make(__('global.title'), 'name')
                ->searchable()
                ->sortable(),
            Column::make('Sterownik', 'driver')
                ->format(fn($value) => $billingManager->getDriver($value)->getLabel())
                ->searchable()
                ->sortable(),
            BooleanColumn::make(__('global.is_active'), 'is_active')
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
            ->setTableRowUrl(static fn(BillingMethod $model) => route('admin.settings.billing-methods.show', $model))
            ->setConfigurableAreas(['before-wrapper' => 'livewire.admin.components.create-model-button'])
            ->setTableRowUrlTarget(static fn() => 'navigate');
    }


    public function create(): void
    {
        $this->redirectRoute('admin.settings.billing-methods.create', navigate: true);
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
