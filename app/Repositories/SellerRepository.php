<?php

namespace App\Repositories;

use App\Models\Seller;
use DB;
use Hash;

class SellerRepository
{
    protected $seller;

    public function __construct(
        Seller $seller
    )
    {
        $this->seller = $seller;
    }
    
    public function getAll(){
        return $this->seller->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getByCustomerId(int $id)
    {
        return DB::table('sellers')->join('customers', 'sellers.customer_id', 'customers.id')
            ->where('customers.user_id', $id)
            ->select('sellers.*')
            ->get();
    }

    public function getById(int $id)
    {
        return $this->seller->where('id', $id)->first();
    }

    public static function checkByName(int $id)
    {
        return DB::table('sellers')->where('id', $id)->first();
    }

    public function create($data, $file_name)
    {
        $attr = [
            'role_id' => 4,
            'name' => 'seller',
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];
        $this->userRepository->create($attr);

        return $this->seller->create([
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
        $email = $this->seller->where('id', $id)->first();
        $this->userRepository->deleteByEmail($email->email);

        return $this->seller->where('id', $id)->delete();
    }

    public static function checkName(int $id)
    {
        return DB::table('sellers')->where('id', $id)->first();
    }
}
