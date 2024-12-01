<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItems extends Model
{
    protected $table = 'food_items';
    public $fillable = [
        'name', 'description','category','vendor_id','price','discount','status','image', 
    ];
    use HasFactory;
}
