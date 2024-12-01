<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivationalMessage extends Model
{
    protected $table = 'motivational_messages';
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'time',

    ];
}
