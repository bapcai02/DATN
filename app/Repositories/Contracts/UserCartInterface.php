<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface UserCartInterface {

    public static function CountPrice(int $user_id);

    public function GetCart($user_id, int $product_id);

    public function getById(int $user_id);

    public function getAll(int $user_id);

    public function check(string $code);

    public function create($data, $user_id);

    public function addCart($product, $user_id);

    public function update($qty, $user_id, $id);

    public function delete(int $id);
}