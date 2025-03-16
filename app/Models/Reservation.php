<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Reservation extends Model
{
    protected $collection = 'reservations';

    protected $fillable = [
        'field_id',
        'customer_id',
        'match_id',
        'status'
    ];
}
