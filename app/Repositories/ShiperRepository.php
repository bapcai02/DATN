<?php

namespace App\Repositories;

use App\Models\Shipping;
use DB;

class ShiperRepository
{
    protected $shiper;

    public function __construct(Shipping $shiper)
    {
        $this->shiper = $shiper;
    }
    
    public function getAll(){
        return $this->shiper->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getById(int $id)
    {
        return $this->shiper->where('id', $id)->first();
    }

    public function create($data, $file_name)
    {
        return $this->shiper->create([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' => $file_name,
            'matp' => $data['matp'],
            'maqh' => $data['maqh'],
            'maxptr' => $data['maxptr'],
        ]);
    }

    public function update($data)
    {
        return $this->shiper->where('id', $data['id'])->update([
            'name' => $data['name'],
            'code' => $data['code'],
            'qty' => $data['qty'],
            'feature' => $data['status'],
            'discount_number' => $data['discoud']
        ]);
    }

    public function delete(int $id)
    {
        return $this->shiper->where('id', $id)->delete();
    }

    public function search($data)
    {
        $start_date = isset($data['start-date']) ? $data['start-date'] . ' ' . "00:00:00" : false;
        $end_date = isset($data['end-date']) ? $data['end-date'] . ' ' . "00:00:00" : false;
        $code = isset($data['code']) ? $data['code'] : false;
        $feature = isset($data['status']) ? (int)($data['status']) : false;
  
        return $this->shiper
        ->when($code, function ($query) use ($code) {
            return $query->Where('code', 'LIKE', "%$code%");
        })
        ->when($feature, function ($query) use ($feature) {
            return $query->where('feature', "=", $feature);
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
