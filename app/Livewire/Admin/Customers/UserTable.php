<?php

namespace App\Livewire\Admin\Customers;


use App\Models\Admin;
use App\Models\Customer;
use App\Models\User;
use App\Traits\Admin\BaseAdminLayout;
use App\Traits\Admin\Tables\BaseDeleteAction;
use Illuminate\Database\Eloquent\Builder;
use LogicException;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;


class UserTable extends DataTableComponent
{
    use BaseAdminLayout, BaseDeleteAction;


    public $columnSearch = [
        'name' => null,
        'email' => null,
    ];


    public string $modelClass = Customer::class;


    public string $tableName = 'users';


    public array $users = [];


    public function activate(): void
    {
        $this->builder()->whereIn('id', $this->getSelected())->update(['email_verified_at' => now()]);
        $this->clearSelected();
        $this->alertSuccess(__('global.activateSuccess'));
    }


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
            Column::make(__('pages.customers.name'), 'name')
                ->searchable()
                ->sortable()
                ->secondaryHeader(fn() => view('tables.cells.input-search', ['field' => 'name', 'columnSearch' => $this->columnSearch]))
                ->html(),

            Column::make(__('pages.customers.email'), 'email')
                ->searchable()
                ->sortable()
                ->secondaryHeader(fn() => view('tables.cells.input-search', ['field' => 'email', 'columnSearch' => $this->columnSearch]))
                ->html(),
            DateColumn::make(__('pages.customers.email_verified_at'), 'email_verified_at')
                ->outputFormat('Y-m-d H:i:s')
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
        $this->model = $this->isAdmin() ? Admin::class : Customer::class;

        $this
            ->setPrimaryKey('id')
            ->setDefaultSort('id', 'desc')
            ->setTableRowUrl(fn($model) => $this->isAdmin() ? route('admin.settings.administrators.show', $model) : route('admin.customers.show', $model))
            ->setTableRowUrlTarget(static fn() => 'navigate')
            ->setTdAttributes(static fn(Column $column) => $column->getTitle() === __('global.action') ? ['style' => 'padding-top: 0px; padding-bottom: 0px;'] : []);
    }


    public function deactivate(): void
    {
        $this->builder()->where('id', $this->getSelected())->update(['email_verified_at' => null]);
        $this->clearSelected();
        $this->alertSuccess(__('global.deactivateSuccess'));

    }


    public function filters(): array
    {
        return [
            TextFilter::make('Name')->config([
                'maxlength' => 5,
                'placeholder' => 'Search Name',
            ])->filter(static function (Builder $builder, string $value) {
                $builder->where('users.name', 'like', '%' . $value . '%');
            }),
            SelectFilter::make('E-mail Verified', 'email_verified_at')
                ->setFilterPillTitle('Verified')
                ->options([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ])->filter(static function (Builder $builder, string $value) {
                    if ($value === 'yes') {
                        $builder->whereNotNull('email_verified_at');
                    } elseif ($value === 'no') {
                        $builder->whereNull('email_verified_at');
                    }
                }),
            DateFilter::make('Verified From')->config([
                'min' => '2000-01-01',
                'max' => now()->format('Y-m-d'),
            ])->filter(static function (Builder $builder, string $value) {
                $builder->where('email_verified_at', '>=', $value);
            }),
            DateFilter::make('Verified To')->filter(static function (Builder $builder, string $value) {
                $builder->where('created_at', '<=', $value);
            }),
            DateFilter::make('Created From')->config([
                'min' => '2000-01-01',
                'max' => now()->format('Y-m-d'),
            ])->filter(static function (Builder $builder, string $value) {
                $builder->where('created_at', '>=', $value);
            }),
            DateFilter::make('Created To')->filter(static function (Builder $builder, string $value) {
                $builder->where('created_at', '<=', $value);
            }),
        ];
    }


    public function mount(?string $modelClass = null): void
    {
        if ($modelClass) {
            if (! is_subclass_of($modelClass, User::class)) {
                throw new LogicException('Model must extend User.');
            }
            $this->modelClass = $modelClass;
        }

        $this->model = app($this->modelClass);
    }


    private function isAdmin(): bool
    {
        return $this->modelClass === Admin::class;
    }
}
