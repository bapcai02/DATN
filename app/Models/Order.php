<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'customer_id', 'shipping_id', 'payment_id', 'status', 
    ];
}
