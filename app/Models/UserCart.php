<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'user_id', 'product_id', 'name', 'qty', 'sale', 'image', 'price'
    ];
}
