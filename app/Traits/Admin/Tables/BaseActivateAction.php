<?php

namespace App\Traits\Admin\Tables;


trait BaseActivateAction
{
    public function activate(): void
    {
        $this->builder()->whereIn('id', $this->getSelected())->update(['is_active' => true]);
        $this->clearSelected();
        $this->alertSuccess(__('global.activateSuccess'));
    }
}
