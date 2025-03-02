<?php

namespace App\Helpers;


class BreadcrumbItem
{
    private string $label;


    private ?string $route;


    public static function make(string $label, ?string $route = null): BreadcrumbItem
    {
        return new self($label, $route);
    }


    public function __construct(string $label, ?string $route = null)
    {
        $this->label = $label;
        $this->route = $route;
    }


    public function getLabel(): string
    {
        return $this->label;
    }


    public function getUrl(): string
    {
        return $this->route ?? '#';
    }


    public function isLink(): bool
    {
        return $this->route !== null;
    }
}
