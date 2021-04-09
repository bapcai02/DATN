<?php

namespace App\Repositories;

use App\Models\Slider;
use DB;
use Hash;

class SliderRepository
{
    protected $slider;

    public function __construct(
        Slider $slider
    )
    {
        $this->slider = $slider;
    }
    
    public function get()
    {
        return $this->slider->where('status', 1)->orderBy('created_at', 'desc')->limit(2)->get();
    }
}
