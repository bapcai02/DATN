<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface CustomerInterface {

    public function getListCustomer();

    public function check($value);

    public function getById(int $id);

    public function create($data);

    public function update($data);

    public function delete(int $id);

    public function search($data);

    public static function getNameCustomer(int $id);

    public static function chekShip(int $id);

}