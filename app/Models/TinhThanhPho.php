<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinhThanhPho extends Model
{
    protected $table = 'vn_tinhthanhpho';
    protected $fillable = [
        'name', 'type'
    ];
}
