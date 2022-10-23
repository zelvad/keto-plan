<?php

namespace Domain\User\Models;

use Domain\User\Models\Concerns\HasRoles;
use Domain\User\Models\Concerns\HasSubscription;
use Domain\User\Models\Concerns\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements UserRole
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasSubscription;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
