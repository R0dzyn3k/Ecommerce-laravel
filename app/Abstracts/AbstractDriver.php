<?php

namespace App\Abstracts;


class AbstractDriver
{
    protected string $label = '';


    public static function key(): string
    {
        return class_basename(static::class);
    }


    public function getLabel(): string
    {
        return $this->label ?: static::key();
    }
}
