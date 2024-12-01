<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllTests extends Model
{
    protected $table = 'all_tests';
    protected $fillable = [
        'patient_id',

    ];
    use HasFactory;
}
