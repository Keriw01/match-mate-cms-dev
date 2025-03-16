<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'team_id',
        'stats'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'stats' => 'array',
    ];
}
