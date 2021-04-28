<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\AddressInterface;

/**
 * AddressController
 * 
 * @property App\Repositories\Contracts\AddressInterface
 */
class AddressController extends Controller
{

    /**
     * AddressController construct
     * 
     * @param AddressInterface $addressInterface
     */
    protected $addressInterface;
    
    public function __construct(
        AddressInterface $addressInterface
    )
    {
        $this->addressInterface = $addressInterface;
    }

    
    /**
     * function index
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $page_tinhtp = $request->page_tinhtp;
        $page_huyen = $request->page_tinhtp;
        $page_xa = $request->page_tinhtp;
        $tinhtp = $this->addressInterface->getListTinhThanhPho();
        $listTinhtp = $this->addressInterface->getTinhThanhPho();
        $listQuanHuyen = $this->addressInterface->getAllQuanHuyen();
        $quanhuyen = $this->addressInterface->getListQuanHuyen();
        $xaphuong = $this->addressInterface->getListXaPhuong();

        return view('admin.pages.address.index', compact(
            'tinhtp', 'quanhuyen', 'xaphuong', 'listTinhtp','listQuanHuyen',
            'page_tinhtp', 'page_huyen', 'page_xa'
        ));
    }

    
    /**
     * function createTinh
     * @param Request $request
     * @return view
     */
    public function createTinh(Request $request)
    {
        $data = $request->all();
        $check = $this->addressInterface->checkNameTinh($data['name']);
        if($check != null){
            return redirect()->back()->with('error-tinh','du lieu da ton tai, vui long kiem tra lại');
        }

        $this->addressInterface->createTinh($data);
        return redirect()->back()->with('message-tinh','Them moi thanh cong');
    }

    /**
     * function editTinh
     * @param Request $request
     * @return redirect
     */
    public function editTinh(Request $request)
    {
        $data = $request->all();
        $tinh = $this->addressInterface->getTinhById($data['id']);
        if($tinh->name != $data['name']){
            $check = $this->addressInterface->checkNameTinh($data['name']);
            if($check != null){
                return redirect()->back()->with('error-tinh','du lieu da ton tai, vui long kiem tra lại');
            }
            $this->addressInterface->editTinh($data);
            return redirect()->back()->with('message-tinh','Chinh sua thanh cong');
        }

        $this->addressInterface->editTinh($data);
        return redirect()->back()->with('message-tinh','chinh sua thanh cong');
    }

     /**
     * function deleteTinh
     * @param Request $request
     * @return redirect
     */
    public function deleteTinh(Request $request)
    {
        $id = $request->id;
        $this->addressInterface->deleteTinh($id);

        return redirect()->back()->with('message-tinh','xoa thanh cong');
    }

      /**
     * function deleteHuyen
     * @param Request $request
     * @return redirect
     */
    public function deleteHuyen(Request $request)
    {
        $id = $request->id;
        $this->addressInterface->deleteHuyen($id);

        return redirect()->back()->with('message-huyen','xoa thanh cong');
    }

     /**
     * function createHuyen
     * @param Request $request
     * @return redirect
     */
    public function createHuyen(Request $request)
    {
        $data = $request->all();
        $check = $this->addressInterface->checkNameHuyen($data['name']);
        if($check != null){
            return redirect()->back()->with('error-huyen','du lieu da ton tai, vui long kiem tra lại');
        }

        $this->addressInterface->createHuyen($data);
        return redirect()->back()->with('message-huyen','Them moi thanh cong');
    }

    /**
     * function editHuyen
     * @param Request $request
     * @return redirect
     */
    public function editHuyen(Request $request)
    {
        $data = $request->all();
        $huyen = $this->addressInterface->getHuyenById($data['id']);
        if($huyen->name != $data['name']){
            $check = $this->addressInterface->checkNameHuyen($data['name']);
            if($check != null){
                return redirect()->back()->with('error-huyen','du lieu da ton tai, vui long kiem tra lại');
            }
            $this->addressInterface->editHuyen($data);
            return redirect()->back()->with('message-huyen','Chinh sua thanh cong');
        }

        $this->addressInterface->editHuyen($data);
        return redirect()->back()->with('message-huyen','Them moi thanh cong');
    }

    /**
     * function deleteXa
     * @param Request $request
     * @return redirect
     */
    public function deleteXa(Request $request)
    {
        $this->addressInterface->deleteXa($request->id);

        return redirect()->back()->with('message-xa','xoa thanh cong');
    }

    /**
     * function createXa
     * @param Request $request
     * @return redirect
     */
    public function createXa(Request $request)
    {
        $data = $request->all();
        $check = $this->addressInterface->checkNameXa($data['name']);
        if($check != null){
            return redirect()->back()->with('error-xa','du lieu da ton tai, vui long kiem tra lại');
        }

        $this->addressInterface->createXa($data);
        return redirect()->back()->with('message-xa','Them moi thanh cong');
    }

     /**
     * function editXa
     * @param Request $request
     * @return redirect
     */
    public function editXa(Request $request)
    {
        $data = $request->all();
        $xa = $this->addressInterface->getXaById($data['id']);
        if($xa->name != $data['name']){
            $check = $this->addressInterface->checkNameXa($data['name']);
            if($check != null){
                return redirect()->back()->with('error-xa','du lieu da ton tai, vui long kiem tra lại');
            }
            $this->addressInterface->editXa($data);
            return redirect()->back()->with('message-xa','Chinh sua thanh cong');
        }

        $this->addressInterface->editXa($data);
        return redirect()->back()->with('message-xa','Them moi thanh cong');
    }
}
