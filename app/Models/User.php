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
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Livewire\Wireable;


class User extends BaseModel implements MustVerifyEmailContract, AuthenticatableContract, AuthorizableContract, CanResetPasswordContract, Wireable
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;


    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;


    protected static string $factory = UserFactory::class;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'role',
        'password',
        'lang',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $table = 'users';


    public static function fromLivewire($value): User
    {
        $user = isset($value['id']) ? self::find($value['id']) : new self();

        $user->fill([
            'firstname' => $value['firstname'] ?? $user->firstname,
            'lastname' => $value['lastname'] ?? $user->lastname,
            'email' => $value['email'] ?? $user->email,
            'phone' => $value['phone'] ?? $user->phone,
            'role' => isset($value['role']) ? UserType::from($value['role']) : $user->role,
            'lang' => $value['lang'] ?? $user->lang,
        ]);

        return $user;
    }


    protected static function booted(): void
    {
        static::creating(static function (self $model) {
            $model->lang = App::currentLocale();
        });

        static::saving(static function (self $model) {
            if ($model->isDirty('firstname') || $model->isDirty('lastname')) {
                $model->name = $model->firstname . ' ' . $model->lastname;
            }
        });
    }


    public function toLivewire(): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role instanceof UserType ? $this->role->value : $this->role,
            'lang' => $this->lang,
        ];
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role' => UserType::class,
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
