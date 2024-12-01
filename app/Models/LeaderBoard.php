<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaderBoard extends Model
{
      

    protected $table = 'leader_board';
   
    public $fillable = [
        'leader_place', 'user_code', 'badge','badge_images'
    ];
    protected $casts = [
        'badge' => 'object',
        'badge_images' => 'object',
    ];
}
