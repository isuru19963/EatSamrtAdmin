<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitations extends Model
{
    protected $table = 'invitations';
    protected $fillable = [
        'invite_by_user_code',
        'invitation_email',

    ];

}
