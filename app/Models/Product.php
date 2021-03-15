<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id', 'brand_id', 'seller_id', 'product_name', 'slug',
        'product_desc', 'product_content', 'product_price', 'sale', 'product_status'
    ];
}
