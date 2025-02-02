<?php

namespace App\Traits\Admin;


use App\Enums\AlertTypes;


trait Alerts
{
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


    protected function alertWarning(string $message): void
    {
        $this->showAlert(AlertTypes::WARNING, $message);
    }


    protected function showAlert(AlertTypes $type, string $message): void
    {
        $this->dispatch('show-alert', [
            'type' => $type->value,
            'message' => $message,
        ]);
    }
}
