<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employer';
    protected $fillable = [
        'user_id', 'name', 'phone', 'phone', 'matp', 'maqh', 'maxptr', 'image',
    ];
}
