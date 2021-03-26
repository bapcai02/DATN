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
        return $this->feeship->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getById(int $id)
    {
        return $this->feeship->where('id', $id)->first();
    }

    public function check(int $matp, int $maqh, int $maxptr)
    {
        return $this->feeship->where('matp', $matp)->where('maqh', $maqh)->where('maxptr', $maxptr)->first();
    }

    public function create($data)
    {
        return $this->feeship->create([
            'matp' => $data['matp'],
            'maqh' => $data['maqh'],
            'maxptr' => $data['maxptr'],
            'feeship' => $data['feeship'],
        ]);
    }

    public function update($data)
    {
        return $this->feeship->where('id', $data['id'])->update([
            'feeship' => $data['feeship'],
        ]);
    }

    public function delete(int $id)
    {
        return $this->feeship->where('id', $id)->delete();
    }

    public function search($data)
    { 
        $matp = isset($data['matp']) ? $data['matp'] : false;
        $maqh = isset($data['maqh']) ? $data['maqh'] : false;
        $maxptr = isset($data['maxptr']) ? $data['maxptr'] : false;
  
        return $this->feeship
        ->when($matp, function ($query) use ($matp) {
            return $query->Where('matp', $matp);
        })
        ->when($maqh, function ($query) use ($maqh) {
            return $query->where('maqh', $maqh);
        })
        ->when($maxptr, function ($query) use ($maxptr) {
            return $query->where('maxptr', $maxptr);
        })
        ->orderBy('created_at')
        ->paginate(6);
    }
}
