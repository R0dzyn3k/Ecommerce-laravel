<?php

namespace App\Livewire\Admin\Settings\Newsletter;


use App\Models\Newsletter;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Menu\BaseSettingMenuItems;
use App\Traits\Admin\Tables\BaseDeleteAction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;


class NewsletterTable extends DataTableComponent
{
    use BaseSettingMenuItems, BaseAdminLayout, BaseDeleteAction;


    public $model = Newsletter::class;


    public string $tableName = 'newsletters';


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
            Column::make(__('pages.newsletter.email'), 'email')
                ->searchable()
                ->sortable(),
            Column::make(__('pages.newsletter.user'), 'user_id')
                ->searchable()
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
            ->setDefaultSort('id', 'desc');
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return $this->renderLayout(parent::render(), title: __('pages.newsletter.title'));
    }


    protected function getSidebarMenuItems(): array
    {
        return $this->getBaseSettingMenuItems();
    }
}
