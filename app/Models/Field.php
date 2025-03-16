<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Field extends Model
{
    protected $collection = 'fields';

    protected $fillable = [
        'name',
        'location',
        'availability',
        'price_per_hour'
    ];
}
