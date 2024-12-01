<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestsForClient extends Model
{
    protected $table = 'test_for_client';
    protected $fillable = [
        'patient_id',
        'test_name',
         'test_data',

    ];
    use HasFactory;
}
