<?php

namespace App\Repositories;

use App\Models\Employee;
use DB;
use Auth;
use App\Repositories\UserRepository;

class EmployeeRepository
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