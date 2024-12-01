<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItemsCategory extends Model
{
    protected $table = 'food_items_category';
    public $fillable = [
        'name', 'description','image', 'status'
    ];
    use HasFactory;
}
