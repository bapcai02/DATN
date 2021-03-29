<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'sellers';
    protected $fillable = [
        'name', 'customer_id', 'shop_info', 'shop_name',
    ];
}
