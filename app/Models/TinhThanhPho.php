<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinhThanhPho extends Model
{
    // protected $table = 'vn_tinhthanhpho';
    protected $table = 'api_tinhthanhpho';
    protected $fillable = [
        'matp', 'name', 'code'
    ];
}
