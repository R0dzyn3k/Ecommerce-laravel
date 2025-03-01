<?php

namespace App\Livewire\Admin\Warehouse;


use App\Livewire\Admin\BaseTilesLayout;
use App\Traits\Admin\Menu\BaseWarehouseMenuItems;


class WarehouseTiles extends BaseTilesLayout
{
    use BaseWarehouseMenuItems;


    private bool $addBaseTileToMenuItems = false;


    protected function getSidebarMenuItems(): array
    {
        return $this->getMenuItems();
    }


    protected function getTitle(): string
    {
        return __('pages.warehouse.title');
    }
}
