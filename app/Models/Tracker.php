<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "tracker_type", "user_id"
    ];

    protected $casts = [
        'tracker_type' => 'object',
    ];


}
