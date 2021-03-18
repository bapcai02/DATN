<?php

namespace App\Repositories;

use App\Models\QuanHuyen;
use App\Models\TinhThanhPho;
use App\Models\XaPhuong;
use DB;

class AddressRepository
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

    public function getTinhThanhPho(){
        return $this->tinhThanhPho->get();
    }

    public function getQuanHuyen(int $matp){
        return $this->quanHuyen->where('matp', $matp)->get();
    }

    public function getXaPhuong(int $maqh){
        return $this->xaPhuong->where('maqh', $maqh)->get();
    }
}
