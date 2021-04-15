<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    // protected $table = 'vn_quanhuyen';
    protected $table = 'api_quanhuyen';
    protected $fillable = [
        'name', 'maqh', 'matp'
    ];
}
