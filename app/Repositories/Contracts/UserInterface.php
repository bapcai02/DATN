<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface UserInterface {

    public function getById(int $id);

    public function checkUser(string $email);

    public function getUserByRole(int $role);

    public function getUser(int $id);

    public function resetPassword(string $email, string $password);

    public function create($attributes);

    public function getNew();

    public function update(int $login_id, $attributes);

    public function delete(int $id);

    public function deleteByEmail(int $email);

}