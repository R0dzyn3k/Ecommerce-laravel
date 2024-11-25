<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


abstract class BaseModel extends Model
{
    use LogsActivity;


    /**
     * Domyślne opcje logowania dla modeli.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('default')
            ->setDescriptionForEvent(static fn(string $eventName) => "This model has been $eventName");
    }
}
