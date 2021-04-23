<?php

namespace App\Repositories;

use App\User;
use DB;
use App\Repositories\Contracts\UserInterface as UserInterface;

class UserRepository implements UserInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function getById(int $id)
    {
        return $this->user->where('id', $id)->first();
    }

    public function checkUser(string $email)
    {
        return $this->user->where('email', $email)->first();
    }

    public function getUserByRole(int $role)
    {
        return $this->user->where('role_id', $role);
    }

    public function getUser(int $id)
    {
        return $this->user->where('id', $id)->first();
    }

    public function resetPassword(string $email, string $password)
    {
        $this->user->where('email', $email)->update(['password' => $password]);
    }

    public function create($attributes)
    {
        return $this->user->create($attributes);
    }

    public function getNew()
    {
        return $this->user->where('role_id', 2)->orderBy('id', 'desc')->first();
    }

    public function update(int $login_id, $attributes)
    {
        return $this->user->where('id', $login_id)->update($attributes);
    }

    public function delete(int $id)
    {
        return $this->user->where('id', $id)->delete();
    }

    public function deleteByEmail(int $email)
    {
        return $this->user->where('email', $email)->delete();
    }
}
