<?php

namespace App\Repositories;

use App\Models\Customer;
use DB;
use App\User;
use App\Repositories\UserRepository;
use Hash;

class CustomerRepository
{
    protected $categories;
    protected $userRepository;

    public function __construct(
        Customer $customer,
        UserRepository $userRepository
    )
    {
        $this->customer = $customer;
        $this->userRepository = $userRepository;
    }

    public function getListCustomer()
    {
        return DB::table('customers')->join('users','customers.user_id','users.id')
                ->select('users.name as user_name', 'users.email as email','users.password', 'customers.*')
                ->orderBy('created_at', 'DESC');
    }

    public function delete(int $id)
    {
        $user_id = $this->customer->where('id', $data['id'])->first();
        $this->userRepository->delete($user_id->user_id);

        return $this->customer->where('id', $id)->delete();
    }

    public function check($value)
    {
        return $this->customer->where('name', $value)->first();
    }

    public function getById(int $id)
    {
        return $this->customer->where('id', $id)->first();
    }

    public function create($data)
    { 

        $attr = [
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'role_id' => 2
        ];  
        $this->userRepository->create($attr);
        $user_id = $this->userRepository->getNew()->id;

        return $this->customer->create([
            'user_id' => $user_id,
            'name' => $data['name'],
            'status' => $data['status'],
            'phone'=>$data['phone'],
            'address' => $data['address']
        ]);
    }

    public function update($data)
    {
        $user_id = $this->customer->where('id', $data['id'])->first();
        $attr = [
            'name' => $data['name'],
            'email' => $data['email'],
        ];
        $this->userRepository->update($user_id->user_id, $attr);
        return $this->customer->where('id', $data['id'])->update([
            'name' => $data['name'],
            'status' => $data['status'],
            'phone'=>$data['phone'],
            'address' => $data['address']
        ]);
    }

    public function search($data)
    {
        $start_date = isset($data['start-date']) ? $data['start-date'] . ' ' . "00:00:00" : false;
        $end_date = isset($data['end-date']) ? $data['end-date'] . ' ' . "00:00:00" : false;
        $name = isset($data['customer']) ? $data['customer'] : false;
        $status = isset($data['status']) ? $data['status'] : false;
        
        return $this->customer
        ->when($name, function ($query) use ($name) {
            return $query->Where('name', 'LIKE', "%$name%");
        })
        ->when($start_date, function ($query) use ($start_date) {
            return $query->WhereDate('created_at', '>=', $start_date);
        })
        ->when($end_date, function ($query) use ($end_date) {
            return $query->WhereDate('created_at', '<=', $end_date);
        })
        ->when($status, function ($query) use ($status) {
            return $query->Where('status', $status);
        })
        ->orderBy('created_at')
        ->paginate(6);
    }

    public static function getNameCustomer(int $id)
    {
        return DB::table('customers')->where('id', $id)->select('name')->first();
    }
}
