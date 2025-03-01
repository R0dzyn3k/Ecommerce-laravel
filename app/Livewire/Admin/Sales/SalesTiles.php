<?php

namespace App\Livewire\Admin\Sales;


use App\Livewire\Admin\BaseTilesLayout;
use App\Traits\Admin\Menu\BaseSalesMenuItems;


class SalesTiles extends BaseTilesLayout
{
    use BaseSalesMenuItems;


    private bool $addBaseTileToMenuItems = false;


    protected function getSidebarMenuItems(): array
    {
        return $this->getMenuItems();
    }


    protected function getTitle(): string
    {
        return __('pages.sales.title');
    }
}
