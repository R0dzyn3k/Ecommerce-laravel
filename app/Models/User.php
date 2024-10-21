<?php

namespace App\Models;


use App\Enums\UserType;
use Database\Factories\UserFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;


abstract class User extends BaseModel implements MustVerifyEmailContract, AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;


    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected
        $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected
        $hidden = [
        'password',
        'remember_token',
    ];


    protected
        $table = 'users';


    protected static function newFactory(): Factory|UserFactory
    {
        return UserFactory::new();
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected
    function casts(): array
    {
        return [
            'role' => UserType::class,
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
