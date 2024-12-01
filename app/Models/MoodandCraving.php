<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodandCraving extends Model
{
    protected $table = 'mood_and_craving';
    protected $fillable = [
        'user_code',
        'challenge_id',
         'challenge_code',
        'mood',
        'craving',
        'time'

    ];
    use HasFactory;
}
