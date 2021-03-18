<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
    protected $table = 'vn_xaphuongthitran';
    protected $fillable = [
        'maqh', 'name', 'type'
    ];
}
