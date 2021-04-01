<?php

namespace App\Repositories;

use App\Models\Employee;
use DB;
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
        return $this->employee->where('user_id', $user_id)->first();
    }

    public function create(string $email)
    {
        $user = $this->userRepository->checkUser($email);
        return $this->employee->create([
            'user_id' => $user->id
        ]);
    }
}