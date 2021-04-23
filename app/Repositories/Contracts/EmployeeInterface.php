<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface EmployeeInterface {

    public function getEmployee(int $user_id);

    public function create(string $email);

    public function update($data, $file);

}