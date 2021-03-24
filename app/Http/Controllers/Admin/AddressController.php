<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AddressRepository;

class AddressController extends Controller
{
    protected $addressRepository;
    
    public function __construct(
        AddressRepository $addressRepository
    )
    {
        $this->addressRepository = $addressRepository;
    }

    public function index(Request $request)
    {
        $page_tinhtp = $request->page_tinhtp;
        $page_huyen = $request->page_tinhtp;
        $page_xa = $request->page_tinhtp;
        $tinhtp = $this->addressRepository->getListTinhThanhPho();
        $listTinhtp = $this->addressRepository->getTinhThanhPho();
        $listQuanHuyen = $this->addressRepository->getAllQuanHuyen();
        $quanhuyen = $this->addressRepository->getListQuanHuyen();
        $xaphuong = $this->addressRepository->getListXaPhuong();

        return view('admin.pages.address.index', compact(
            'tinhtp', 'quanhuyen', 'xaphuong', 'listTinhtp','listQuanHuyen',
            'page_tinhtp', 'page_huyen', 'page_xa'
        ));
    }

    public function createTinh(Request $request)
    {
        $data = $request->all();
        $check = $this->addressRepository->checkNameTinh($data['name']);
        if($check != null){
            return redirect()->back()->with('error-tinh','du lieu da ton tai, vui long kiem tra lại');
        }

        $this->addressRepository->createTinh($data);
        return redirect()->back()->with('message-tinh','Them moi thanh cong');
    }

    public function editTinh(Request $request)
    {
        $data = $request->all();
        $tinh = $this->addressRepository->getTinhById($data['id']);
        if($tinh->name != $data['name']){
            $check = $this->addressRepository->checkNameTinh($data['name']);
            if($check != null){
                return redirect()->back()->with('error-tinh','du lieu da ton tai, vui long kiem tra lại');
            }
            $this->addressRepository->editTinh($data);
            return redirect()->back()->with('message-tinh','Chinh sua thanh cong');
        }

        $this->addressRepository->editTinh($data);
        return redirect()->back()->with('message-tinh','chinh sua thanh cong');
    }

    public function deleteTinh(Request $request)
    {
        $id = $request->id;
        $this->addressRepository->deleteTinh($id);

        return redirect()->back()->with('message-tinh','xoa thanh cong');
    }

    public function deleteHuyen(Request $request)
    {
        $id = $request->id;
        $this->addressRepository->deleteHuyen($id);

        return redirect()->back()->with('message-huyen','xoa thanh cong');
    }

    public function createHuyen(Request $request)
    {
        $data = $request->all();
        $check = $this->addressRepository->checkNameHuyen($data['name']);
        if($check != null){
            return redirect()->back()->with('error-huyen','du lieu da ton tai, vui long kiem tra lại');
        }

        $this->addressRepository->createHuyen($data);
        return redirect()->back()->with('message-huyen','Them moi thanh cong');
    }

    public function editHuyen(Request $request)
    {
        $data = $request->all();
        $huyen = $this->addressRepository->getHuyenById($data['id']);
        if($huyen->name != $data['name']){
            $check = $this->addressRepository->checkNameHuyen($data['name']);
            if($check != null){
                return redirect()->back()->with('error-huyen','du lieu da ton tai, vui long kiem tra lại');
            }
            $this->addressRepository->editHuyen($data);
            return redirect()->back()->with('message-huyen','Chinh sua thanh cong');
        }

        $this->addressRepository->editHuyen($data);
        return redirect()->back()->with('message-huyen','Them moi thanh cong');
    }

    public function deleteXa(Request $request)
    {
        $this->addressRepository->deleteXa($request->id);

        return redirect()->back()->with('message-xa','xoa thanh cong');
    }

    public function createXa(Request $request)
    {
        $data = $request->all();
        $check = $this->addressRepository->checkNameXa($data['name']);
        if($check != null){
            return redirect()->back()->with('error-xa','du lieu da ton tai, vui long kiem tra lại');
        }

        $this->addressRepository->createXa($data);
        return redirect()->back()->with('message-xa','Them moi thanh cong');
    }

    public function editXa(Request $request)
    {
        $data = $request->all();
        $xa = $this->addressRepository->getXaById($data['id']);
        if($xa->name != $data['name']){
            $check = $this->addressRepository->checkNameXa($data['name']);
            if($check != null){
                return redirect()->back()->with('error-xa','du lieu da ton tai, vui long kiem tra lại');
            }
            $this->addressRepository->editXa($data);
            return redirect()->back()->with('message-xa','Chinh sua thanh cong');
        }

        $this->addressRepository->editXa($data);
        return redirect()->back()->with('message-xa','Them moi thanh cong');
    }
}
