<?php
namespace App\Repositories\Contracts;

use App\Repositories;
 
interface BrandInterface {

    public function get();

    public function getAll();

    public function getById(int $id);

    public function check(string $name);

    public function create($data);

    public function update($data);

    public static function checkBrandName(int $id);

    public function delete(int $id);

    public function search($data);

    
}