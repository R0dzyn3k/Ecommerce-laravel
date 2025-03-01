<?php

namespace App\Helpers;


use App\Enums\MenuItemType;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Wireable;
use Override;


class SubMenuItem implements Wireable
{
    public array $children = [];


    public ?string $icon = null;


    public string $label;


    public ?array $params = null;


    public ?string $route = null;


    public string $title;


    public MenuItemType $type;


    public ?string $url = null;


    /**
     * @param array $value
     *
     * @return SubMenuItem
     */
    #[Override] public static function fromLivewire($value): SubMenuItem
    {
        return new self(
            label: $value['label'],
            type: MenuItemType::from($value['type']),
            icon: $value['icon'] ?? null,
            url: $value['url'] ?? null,
            title: $value['title'] ?? null,
            children: array_map(static fn($child) => self::fromLivewire($child), $value['children'])
        );
    }


    public function __construct(
        string       $label,
        MenuItemType $type,
        ?string      $icon = null,
        ?string      $url = null,
        ?string      $route = null,
        ?string      $title = null,
        ?array       $params = null,
        null|array   $children = null
    ) {
        $this->label = $label;
        $this->title = $title ?? $label;
        $this->type = $type;
        $this->icon = $icon;

        switch ($type) {
            case MenuItemType::Group:

                break;
            case MenuItemType::InternalLink:
                if ($route) {
                    $this->route = $route;
                    $this->params = $params ?? [];
                    $this->url = route($route, $this->params, absolute: false);
                }

                break;
            case MenuItemType::ExternalLink:
                $this->url = $url;

                break;
        }

        $this->children = $children ?? [];
    }


    public function hasChildren(): bool
    {
        return ! empty($this->children);
    }


    public function isActive(): bool
    {
        if ($this->type->isInternalLink()) {
            return request()->routeIs($this->route);
        }

        return false;
    }


    #[ArrayShape([
        'children' => "array",
        'icon' => "null|string",
        'label' => "string",
        'title' => "string",
        'type' => "string",
        'url' => "string",
    ])]
    public function toLivewire(): array
    {
        return [
            'children' => $this->children,
            'icon' => $this->icon,
            'label' => $this->label,
            'title' => $this->title,
            'type' => $this->type->value,
            'url' => $this->url,
        ];
    }
}

