<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'brand_name', 'brand_description', 'brand_status', 'brand_slug', 'brand_keyword'
    ];
}
