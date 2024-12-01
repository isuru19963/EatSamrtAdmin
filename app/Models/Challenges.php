<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenges extends Model
{
    protected $table = 'challenges';
    protected $fillable = [
        'user_code',
        'time_elapsed',
        'challenge_code',
        'challenge_start_date',
        'challenge_start_time',
        'date_time'

    ];
    use HasFactory;
}
