<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface CategoryInterface {

    public function getListCategory();

    public function delete(int $id);

    public function check($value);

    public function getOne($id);

    public function create($data);

    public static function checkCategoryName(int $id);

    public function update($data);

    public function search($data);

}