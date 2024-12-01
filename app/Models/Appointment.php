<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = [
        'doctor_id',
        'user_id',
        'date',
        'session_name',
        'status'


    ];
    use HasFactory;
}
