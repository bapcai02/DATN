<?php

namespace App\Repositories;

use App\Models\Feeship;
use DB;

class FeeShipRepository
{
    protected $feeship;

    public function __construct(Feeship $feeship)
    {
        $this->feeship = $feeship;
    }
    
    public function getAll(){
        return $this->feeship
        ->join('vn_tinhthanhpho', 'feeships.matp', 'vn_tinhthanhpho.id')
        ->join('vn_quanhuyen', 'feeships.maqh', 'vn_quanhuyen.id')
        ->join('vn_xaphuongthitran', 'feeships.maxptr', 'vn_xaphuongthitran.id')
        ->select('')
        ->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getById(int $id)
    {
        return $this->feeship->where('id', $id)->first();
    }

    public function check(string $code)
    {
        return $this->feeship->where('code', $code)->where('feature', 1)->first();
    }

    public function create($data)
    {
        return $this->feeship->create([
            'name' => $data['name'],
            'code' => $data['code'],
            'qty' => $data['qty'],
            'feature' => $data['status'],
            'discount_number' => $data['discoud']
        ]);
    }

    public function update($data)
    {
        return $this->coupons->where('id', $data['id'])->update([
            'name' => $data['name'],
            'code' => $data['code'],
            'qty' => $data['qty'],
            'feature' => $data['status'],
            'discount_number' => $data['discoud']
        ]);
    }

    public function delete(int $id)
    {
        return $this->coupons->where('id', $id)->delete();
    }

    public function search($data)
    {
        $start_date = isset($data['start-date']) ? $data['start-date'] . ' ' . "00:00:00" : false;
        $end_date = isset($data['end-date']) ? $data['end-date'] . ' ' . "00:00:00" : false;
        $code = isset($data['code']) ? $data['code'] : false;
        $feature = isset($data['status']) ? (int)($data['status']) : false;
  
        return $this->coupons
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
