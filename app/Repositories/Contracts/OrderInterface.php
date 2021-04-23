<?php
namespace App\Repositories\Contracts;

use App\Repositories;

interface OrderInterface {

    public function getAll();

    public function getOrderByUser(int $id);

    public function getOrderByCustomer(int $id);

    public function addOrder($data);

    public function orderByPayment($orderCode, $data);

    public function getByAdmin();

    public function search($data);
}