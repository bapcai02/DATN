<?php

namespace App\Repositories;

use App\User;
use DB;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function checkUser(string $email)
    {
        return $this->user->where('email', $email)->first();
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

    public function update($login_id, $attributes)
    {
        return $this->user->where('id', $login_id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}
