<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $table = 'patients';
    protected $fillable = [
        'patient_id',
        'patient_name',
        'doctor_id',
        'patient_mobile',
        'alternative_number',
        'patient_profile',
        'patient_age',
        'gender',
        'occupation',
        'smoke_category',
        'smoke_items',
        'alchohol',
        'alchohol_duration',
        'other_drugs',
        'medical_history',
        'smoked_title',
        'smokedless_title',

    ];
    use HasFactory;
}
