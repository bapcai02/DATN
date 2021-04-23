<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface SellerInterface {

    public function getAll();

    public function getByCustomerId(int $id);

    public function getById(int $id);

    public static function checkByName(int $id);

    public function create($data, $file_name);

    public function delete(int $id);

    public static function checkName(int $id);
}