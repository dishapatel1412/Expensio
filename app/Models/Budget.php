<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'amount',
        'month',
        'year',
        'user_id'
    ];
}
