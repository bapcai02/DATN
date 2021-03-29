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
        $check = $this->userRepository->checkUser($request->email);
        if($check == null){
            $data = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file->move('assets/images', $file->getClientOriginalName());
            }
            $this->shiperRepository->create($data, $file_name);

            return redirect()->back()->with('message-shiper', 'them moi thanh cong');
        }
        return redirect()->back()->with('error-shiper', 'email da ton tai, vui long kiem tra lai');
        
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $shiper = $this->shiperRepository->search($request->all());
        $user = $this->userRepository->getUserByRole(4)->get();
        $tinhtp = $this->addressRepository->getTinhThanhPho();

        return view('admin.pages.shiper.index', compact('shiper', 'page', 'user', 'tinhtp'));
    }
}
