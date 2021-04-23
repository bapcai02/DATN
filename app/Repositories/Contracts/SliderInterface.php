<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface SliderInterface {

    public function get();

    public function getAll();

    public function create($data);

    public function delete(int $id);

}