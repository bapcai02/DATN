<?php

namespace App\Repositories;

use App\Models\Brand;
use DB;

class BrandRepository
{
    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
    
    public function get(){
        return $this->brand->orderBy('created_at', 'desc')->get();
    }

    public function getAll(){
        return $this->brand->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getById(int $id)
    {
        return $this->brand->where('id', $id)->first();
    }

    public function check(string $name)
    {
        return $this->brand->where('brand_name','LIKE', $name)->where('brand_status', 1)->first();
    }

    public function create($data)
    {
        return $this->brand->create([
            'brand_name' => $data['name'],
            'brand_description' => $data['desc'],
            'brand_status' => $data['status'],
            'brand_keyword' => $data['key'],

        ]);
    }

    public function update($data)
    {
        return $this->brand->where('id', $data['id'])->update([
            'brand_name' => $data['name'],
            'brand_description' => $data['desc'],
            'brand_status' => $data['status'],
            'brand_keyword' => $data['key'],
        ]);
    }

    public static function checkBrandName(int $id)
    {
        return DB::table('brands')->where('id', $id)->first();
    }

    public function delete(int $id)
    {
        return $this->brand->where('id', $id)->delete();
    }

    public function search($data)
    {
        $start_date = isset($data['start-date']) ? $data['start-date'] . ' ' . "00:00:00" : false;
        $end_date = isset($data['end-date']) ? $data['end-date'] . ' ' . "00:00:00" : false;
        $name = isset($data['name']) ? $data['name'] : false;
        $status = isset($data['status']) ? (int)($data['status']) : false;
  
        return $this->brand
        ->when($name, function ($query) use ($name) {
            return $query->Where('brand_name', 'LIKE', "%$name%");
        })
        ->when($status, function ($query) use ($status) {
            return $query->where('brand_status', "=", $status);
        })
        ->when($start_date, function ($query) use ($start_date) {
            return $query->WhereDate('created_at', '>=', $start_date);
        })
        ->when($end_date, function ($query) use ($end_date) {
            return $query->WhereDate('created_at', '<=', $end_date);
        })  
        ->orderBy('created_at')
        ->paginate(6);
    }
}
