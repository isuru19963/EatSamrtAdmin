<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    public $fillable = [
        'title', 'photo',' keywords','short_description','description','category_id','slug_name','status' 
    ];
}
