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

    public function getAll()
    {
        return $this->slider->orderBy('created_at', 'desc')->paginate(6);
    }

    public function delete(int $id)
    {
        $this->slider->where('id', $id)->delete();
    }

    public function create($data)
    {
        $product_id = $data['product'];
        $status = $data['status'];
        $desc = $data['desc'];
        $product_image = DB::table('product_images')->where('product_id', $product_id)->first();

        $this->slider->create([
            'product_id' =>  $product_id,
            'images' => $product_image->image,
            'descript' =>  $desc,
            'status' => $status
        ]);
    }
}
