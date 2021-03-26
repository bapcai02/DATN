<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FeeShipRepository;
use App\Repositories\AddressRepository;

class FeeShipController extends Controller
{
    protected $feeShipRepository;

    public function __construct(
        FeeShipRepository $feeShipRepository,
        AddressRepository $addressRepository
    )
    {
        $this->feeShipRepository = $feeShipRepository;
        $this->addressRepository = $addressRepository;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $feeship = $this->feeShipRepository->getAll();
        $tinhtp = $this->addressRepository->getTinhThanhPho();
    
        return view('admin.pages.feeship.index', compact('feeship', 'page', 'tinhtp'));
    }

    public function delete(Request $request)
    {
        $this->feeShipRepository->delete($request->id);

        return redirect()->back()->with('message-feeship', 'xoa thanh cong');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $check = $this->feeShipRepository->check($data['matp'], $data['maqh'], $data['maxptr']);

        if($check != null){
            return redirect()->back()->with('error-feeship', 'phi ship da duoc tao, vui long kiem tra lai !');
        }
        $this->feeShipRepository->create($data);
        return redirect()->back()->with('message-feeship', 'them moi thanh cong');
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $this->feeShipRepository->update($data);

        return redirect()->back()->with('message-feeship', 'chinh sua thanh cong');
    }

    public function search(Request $request)
    {
        $tinhtp = $this->addressRepository->getTinhThanhPho();
        $page = $request->page;
        $feeship = $this->feeShipRepository->search($request->all());

        return view('admin.pages.feeship.index', compact('feeship', 'page', 'tinhtp'));
    }

    public function getQuanHuyen(Request $request){
        $matp = $request->matp;
        $data = $this->addressRepository->getQuanHuyen($matp);

        return response()->json($data);
    }

    public function getXaPhuong(Request $request){
        $maqh = $request->maqh;
        $data = $this->addressRepository->getXaPhuong($maqh);
        
        return response()->json($data);
    }
}
