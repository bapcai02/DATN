<?php

namespace App\Repositories;

use App\Models\Employee;
use DB;
use Auth;
use App\Repositories\UserRepository;
use App\Repositories\Contracts\EmployeeInterface as EmployeeInterface;

class EmployeeRepository implements EmployeeInterface
{
    protected $employee;
    protected $userRepository;

    public function __construct(
        Employee $employee,
        UserRepository $userRepository
    )
    {
        $this->employee = $employee;
        $this->userRepository = $userRepository;
    }

    public function getEmployee(int $user_id)
    {
        return $this->employee->join('users', 'employer.user_id', 'users.id')
        ->where('user_id', $user_id)
        ->select('employer.*', 'users.email')
        ->first();
    }  

    public static function getById(int $id)
    {
       return DB::table('employer')->where('user_id', $id)->first();
    }

    public function create(string $email)
    {
        $user = $this->userRepository->checkUser($email);

        return $this->employee->create([
            'user_id' => $user->id
        ]);
    }

    public function update($data, $file)
    {
        $this->employee->where('user_id', Auth::user()->id)
        ->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'date' => $data['date'],
            'address' => $data['address'],
            'image' => $file,
        ]);
    }
}