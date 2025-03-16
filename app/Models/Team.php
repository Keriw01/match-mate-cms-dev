<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Team extends Model
{
    protected $collection = 'teams';

    protected $fillable = [
        'name',
        'admin_id',
        'moderators',
        'players',
        'matches_played'
    ];

    protected $casts = [
        'moderators' => 'array',
        'players' => 'array',
    ];
}
