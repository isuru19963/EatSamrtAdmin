<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseLineSurvey extends Model
{
    // protected $table = 'signup_survey';
    // protected $fillable = [
    //     'user_id',
    //     'data',
    //     'status',

    // ];
    protected $table = 'baseline_survey';
    protected $fillable = [
        'user_code',
        'name',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
        'q8',
        'q9',
        'q10',
        'q11',
        'q12',
        'q13',
        'q14',
        'q15',
        'q16',

    ];
    use HasFactory;
}
