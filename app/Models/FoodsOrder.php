<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodsOrder extends Model
{
    protected $table = 'foods_order';
    public $fillable = [
        'user_id', 'ordered_foods','amount','order_type','restaurant_id','payment_method','otp','delivery_address', 'delivery_location','order_note','payment_status','delivery_boy','status', 
    ];
    use HasFactory;
}
