<?php
namespace App\Repositories\Contracts;

use App\Repositories;
 
interface ProductInterface {

    public function getListProduct();

    public function getProductById(int $id);

    public function getProductImageById(int $id);

    public function getRatingImageById(int $id);

    public function getProductTag(int $id);

    public function create($data, $id, $file_name1,  $file_name2, $file_name3, $file_name4);

    public function getProductByCustomer(int $id);

    public function delete(int $id);

    public function Search(string $text);

    public function getByAdmin();

    public function getProductByCategoryId(int $id);

    public static function getImage($id);

    public function searchProductCustomer($data, $customer_id);

    public function searchAdmin($data);

    public function getBySeller(int $id);

    public static function getName(int $id);

    public function rating($data);

    public function getRating(int $id);

    public function FilterProductByPrice($data);
    
}