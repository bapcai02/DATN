<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface CouponInterface {

    public function getAll();

    public function getById(int $id);

    public function check(string $code);

    public function create($data);

    public function update($data);

    public function delete(int $id);

    public function search($data);

}