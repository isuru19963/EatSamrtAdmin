<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSession extends Model
{
    protected $table = 'patient_sessions';
    protected $fillable = [
        'user_id',
        'session_name',
        'status',
        'precentage',
        'date',

    ];
    use HasFactory;
}
