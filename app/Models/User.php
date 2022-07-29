<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRole;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\{
    Casts\Attribute,
    Factories\HasFactory,
    Prunable,
    SoftDeletes
};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Prunable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsAdminAttribute(): bool
    {
        return $this->attributes['role'] == UserRole::ADMIN()->getValue();
    }

    public function getNameAttribute(): string
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function password(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => bcrypt($value),
        );
    }

    public function prunable()
    {
        return static::where('created_at', '<=', now()->subWeek());
    }
}
