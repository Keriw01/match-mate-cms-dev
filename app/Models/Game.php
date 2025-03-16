<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Game extends Model
{
    protected $collection = 'matches';

    protected $fillable = [
        'team_1_id', 'team_2_id',
        'field_id',
        'date', 'result',
        'players_stats',
        'status'
    ];

    protected $casts = [
        'players_stats' => 'array',
    ];
}
