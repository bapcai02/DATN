<?php

namespace App\Repositories;

use App\Models\Shipping;
use DB;
use App\Repositories\UserRepository;
use Hash;

class ShiperRepository
{
    protected $shiper;
    protected $userRepository;

    public function __construct(
        Shipping $shiper,
        UserRepository $userRepository
    )
    {
        $this->shiper = $shiper;
        $this->userRepository = $userRepository;
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
        $attr = [
            'role_id' => 4,
            'name' => 'Shiper',
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];
        $this->userRepository->create($attr);

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

    public function delete(int $id)
    {
        $email = $this->shiper->where('id', $id)->first();
        $this->userRepository->deleteByEmail($email->email);

        return $this->shiper->where('id', $id)->delete();
    }

    public function search($data)
    {
        $matp = isset($data['matp']) ? $data['matp'] : false;
        $maqh = isset($data['maqh']) ? $data['maqh'] : false;
        $maxptr = isset($data['maxptr']) ? $data['maxptr'] : false;
  
        return $this->shiper
        ->when($matp, function ($query) use ($matp) {
            return $query->Where('matp', $matp);
        })
        ->when($maqh, function ($query) use ($maqh) {
            return $query->where('maqh', $maqh);
        })
        ->when($maxptr, function ($query) use ($maxptr) {
            return $query->Where('maxptr', $maxptr);
        })
        ->orderBy('created_at')
        ->paginate(6);
    }
}
