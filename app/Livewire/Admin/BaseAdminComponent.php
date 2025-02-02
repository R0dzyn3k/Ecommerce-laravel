<?php

namespace App\Livewire\Admin;


use App\Traits\Admin\Alerts;
use App\Traits\Admin\BaseAdminLayout;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


abstract class BaseAdminComponent extends Component
{
    use BaseAdminLayout;
    use Alerts;


    protected bool $alertErrorOnFailed = false;


    public function validate($rules = null, $messages = [], $attributes = []): array
    {
        try {
            return parent::validate($rules, $messages, $attributes);
        } catch (ValidationException $exception) {
            if ($this->alertErrorOnFailed) {
                $this->alertError(__('validation.custom.validationError'));
            }

            throw $exception;
        }
    }
}
