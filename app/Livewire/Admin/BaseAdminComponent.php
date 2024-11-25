<?php

namespace App\Livewire\Admin;


use App\Enums\AlertTypes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


abstract class BaseAdminComponent extends Component
{
    protected bool $alertErrorOnFailed = false;


    public function validate($rules = null, $messages = [], $attributes = [])
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


    protected function alertError(string $message): void
    {
        $this->showAlert(AlertTypes::ERROR, $message);
    }


    protected function alertInfo(string $message): void
    {
        $this->showAlert(AlertTypes::INFO, $message);
    }


    protected function alertSuccess(string $message): void
    {
        $this->showAlert(AlertTypes::SUCCESS, $message);
    }


    protected function alertWARNING(string $message): void
    {
        $this->showAlert(AlertTypes::WARNING, $message);
    }


    protected function renderWithLayout(View $view, string $title): Application|Factory|View|\Illuminate\View\View
    {
        return $view->layout('components.layouts.base-admin', ['title' => $title]);
    }


    protected function showAlert(AlertTypes $type, string $message): void
    {
        $this->dispatch('show-alert', [
            'type' => $type->value,
            'message' => $message,
        ]);
    }
}
