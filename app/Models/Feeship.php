<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    protected $table = 'feeships';
    protected $fillable = [
        'matp', 'maqh', 'maxptr', 'feeship', 
    ];
}

