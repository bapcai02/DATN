<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ShiperRepository;
use App\Repositories\AddressRepository;
use App\Repositories\UserRepository;

class ShiperController extends Controller
{
    protected $shiperRepository;

    public function __construct(
        ShiperRepository $shiperRepository,
        AddressRepository $addressRepository,
        UserRepository $userRepository
    )
    {
        $this->shiperRepository = $shiperRepository;
        $this->addressRepository = $addressRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $shiper = $this->shiperRepository->getAll();
        $user = $this->userRepository->getUserByRole(4)->get();
        $tinhtp = $this->addressRepository->getTinhThanhPho();

        return view('admin.pages.shiper.index', compact('shiper', 'page', 'tinhtp', 'user'));
    }

    public function delete(Request $request)
    {
        $this->shiperRepository->delete($request->id);

        return redirect()->back()->with('message-shiper', 'xoa thanh cong');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move('assets/images', $file->getClientOriginalName());
        }
        $this->shiperRepository->create($data, $file_name);

        return redirect()->back()->with('message-shiper', 'them moi thanh cong');
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $code = $this->shiperRepository->check($data['code']);
        $shiper = $this->shiperRepository->getById($data['id']);

        if($shiper->code != $data['code']){
            if($code != null){
                return redirect()->back()->with('error-shiper', 'ma giam gia da duoc tao, vui long kiem tra lai !');
            }
            $this->shiperRepository->update($data);

            return redirect()->back()->with('message-shiper', 'chinh sua thanh cong');
        }

        $this->shiperRepository->update($data);

        return redirect()->back()->with('message-shiper', 'chinh sua thanh cong');
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $shiper = $this->shiperRepository->search($request->all());

        return view('admin.pages.shiper.index', compact('shiper', 'page'));
    }
}
