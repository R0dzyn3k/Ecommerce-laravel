<?php

namespace App\Enums;


enum MenuItemType: string
{
    case Group = 'group';
    case InternalLink = 'internal_link';
    case ExternalLink = 'external_link';


    public static function externalLink(): string
    {
        return self::ExternalLink->value;
    }


    public static function group(): string
    {
        return self::Group->value;
    }


    public static function internalLink(): string
    {
        return self::InternalLink->value;
    }


    public function isExternalLink(): bool
    {
        return $this->value === self::ExternalLink->value;
    }


    public function isGroup(): bool
    {
        return $this->value === self::Group->value;
    }


    public function isInternalLink(): bool
    {
        return $this->value === self::InternalLink->value;
    }
}
