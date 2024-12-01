<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushTokens extends Model
{

    protected $table = 'push_tokens';

    protected $fillable = [
        'user_code',
        'status',
        'token',
        'device_type'
    ];
}
