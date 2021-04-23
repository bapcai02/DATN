<?php

namespace App\Repositories;

use App\Models\QuanHuyen;
use App\Models\TinhThanhPho;
use App\Models\XaPhuong;
use App\Repositories\Contracts\AddressInterface as AddressInterface;
use DB;

class AddressRepository implements AddressInterface
{
    protected $quanHuyen;
    protected $tinhThanhPho;
    protected $xaPhuong;

    public function __construct(
        QuanHuyen $quanHuyen,
        TinhThanhPho $tinhThanhPho,
        XaPhuong $xaPhuong
    )
    {
        $this->quanHuyen = $quanHuyen;
        $this->tinhThanhPho = $tinhThanhPho;
        $this->xaPhuong = $xaPhuong;
    }

    public function getListTinhThanhPho()
    {
        return $this->tinhThanhPho->orderBy('created_at', 'desc')->paginate(6,  ['*'], 'page_tinhtp');
    }

    public function getTinhThanhPho()
    {
        return $this->tinhThanhPho->get();
    }

    public function getListQuanHuyen()
    {
        return $this->quanHuyen->orderBy('created_at', 'desc')->paginate(6,  ['*'], 'page_huyen');
    }

    public static function getThanhPhoById(int $id)
    {
        return DB::table('vn_tinhThanhPho')->where('id', $id)->first();
    }

    public static function getQuanHuyenById(int $id)
    {
        return DB::table('vn_quanHuyen')->where('id', $id)->first();
    }

    public static function getXaPhuongById(int $id)
    {
        return DB::table('vn_xaphuongthitran')->where('id', $id)->first();
    }

    public function getQuanHuyen(int $matp)
    {
        return $this->quanHuyen->where('matp', $matp)->get();
    }

    public function getAllQuanHuyen()
    {
        return $this->quanHuyen->get();
    }

    public function getListXaPhuong()
    {
        return $this->xaPhuong->orderBy('created_at', 'desc')->paginate(6,  ['*'], 'page_xa');
    }

    public function getXaPhuong(int $maqh)
    {
        return $this->xaPhuong->where('maqh', $maqh)->get();
    }

    public function checkNameTinh(string $name)
    {
        return $this->tinhThanhPho->where('name', $name)->first();
    }

    public function checkNameHuyen(string $name)
    {
        return $this->quanHuyen->where('name', $name)->first();
    }

    public function checkNameXa(string $name)
    {
        return $this->xaPhuong->where('name', $name)->first();
    }

    public function getTinhById($id)
    {
        return $this->tinhThanhPho->where('id', $id)->first();
    }

    public function getHuyenById($id)
    {
        return $this->tinhThanhPho->where('id', $id)->first();
    }

    public function getXaById($id)
    {
        return $this->tinhThanhPho->where('id', $id)->first();
    }

    public function createTinh($data)
    {
        return $this->tinhThanhPho->create([
            'name' => $data['name'],
            'type' => $data['type']
        ]);
    }

    public function createHuyen($data)
    {
        return $this->quanHuyen->create([
            'name' => $data['name'],
            'type' => $data['type'],
            'matp' => $data['matp']
        ]);
    }

    public function createXa($data)
    {
        return $this->xaPhuong->create([
            'name' => $data['name'],
            'type' => $data['type'],
            'maqh' => $data['maqh']
        ]);
    }

    public function deleteTinh(int $id)
    {
        $mqh = $this->quanHuyen->where('matp', $id)->get();
        if(count($mqh)!= 0){
            foreach($mqh as $value){
                $this->xaPhuong->where('maqh', $value->id)->delete();
            }
        }
        
        $this->quanHuyen->where('matp', $id)->delete();
        $this->tinhThanhPho->where('id', $id)->delete();
    }

    public function editTinh($data)
    {
        return $this->tinhThanhPho->where('id', $data['id'])
        ->update([
            'name' => $data['name'],
            'type' => $data['type']
        ]);
    }

    public function editXa($data)
    {
        return $this->xaPhuong->where('id', $data['id'])
        ->update([
            'name' => $data['name'],
            'type' => $data['type']
        ]);
    }

    public function deleteHuyen(int $id)
    {
        $this->xaPhuong->where('maqh', $id)->delete();
        $this->quanHuyen->where('id', $id)->delete();
    }

    public function deleteXa(int $id)
    {
        $this->xaPhuong->where('maqh', $id)->delete();
    }
}
