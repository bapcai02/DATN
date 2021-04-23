<?php
namespace App\Repositories\Contracts;

use App\Repositories;
 
interface AddressInterface {
	
	public function getListTinhThanhPho();
	
	public function getTinhThanhPho();

    public function getListQuanHuyen();

    public static function getThanhPhoById(int $id);

    public static function getQuanHuyenById(int $id);

    public static function getXaPhuongById(int $id);

    public function getQuanHuyen(int $matp);

    public function getAllQuanHuyen();

    public function getListXaPhuong();

    public function getXaPhuong(int $maqh);

    public function checkNameTinh(string $name);

    public function checkNameHuyen(string $name);

    public function checkNameXa(string $name);

    public function getTinhById($id);

    public function getHuyenById($id);

    public function getXaById($id);

    public function createTinh($data);

    public function createHuyen($data);

    public function createXa($data);

    public function deleteTinh(int $id);

    public function editTinh($data);

    public function editXa($data);

    public function deleteHuyen(int $id);

    public function deleteXa(int $id);
	
}