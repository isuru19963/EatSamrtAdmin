<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBadges extends Model
{
    protected $table = 'user_badges';
    use HasFactory;
    public $fillable = [
        'badge_id', 'user_code', 'earned_date'
    ];
}
