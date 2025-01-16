<?php

namespace App\Traits\Admin\Tables;


trait BaseDeactivateAction
{
    public function deactivate(): void
    {
        $this->builder()->whereIn('id', $this->getSelected())->update(['is_active' => false]);
        $this->clearSelected();
        $this->alertSuccess(__('global.deactivateSuccess'));
    }
}
