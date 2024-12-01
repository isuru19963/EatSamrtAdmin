<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllExersices extends Model
{
    protected $table = 'all_exercises';
    public $fillable = [
        'exerciser_name', 'image','description','unit'
    ];
    use HasFactory;
}
