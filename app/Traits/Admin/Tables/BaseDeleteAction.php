<?php

namespace App\Traits\Admin\Tables;


trait BaseDeleteAction
{
    public function delete(): void
    {
        $this->builder()->whereIn('id', $this->getSelected())->delete();
        $this->clearSelected();
        $this->alertSuccess(__('global.deleteSuccess'));
    }
}
