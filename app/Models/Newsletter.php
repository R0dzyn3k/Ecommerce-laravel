<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Newsletter extends BaseModel
{
    protected $fillable = [
        'email',
        'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
}
