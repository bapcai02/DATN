<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;

class CustomerController extends Controller
{
    protected $customerRepository;
    protected $userRepository;

    public function __construct(
        CustomerRepository $customerRepository,
        UserRepository $userRepository
    )
    {
        $this->customerRepository = $customerRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $customer = $this->customerRepository->getListCustomer()->paginate(6);
       
        return view('admin.pages.customer.index', compact('customer', 'page'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $check =  $this->customerRepository->check($data['name']);
        $checkEmail = $this->userRepository->checkUser($data['email']);
        if($check != null || $checkEmail != null){
            return redirect()->back()->with('error', 'thong tin da ton tai, vui long kiem tra lai!');
        }
        $this->customerRepository->create($data);

        return redirect()->back()->with('message', 'them moi thanh cong !');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $this->customerRepository->delete($id);

        return redirect()->back()->with('message', 'xoa thanh thanh cong !');
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $customer = $this->customerRepository->getById($data['id']);
        $user = $this->userRepository->getById($customer->user_id);
       
        if($user->email != $data['email']){

            $check= $this->userRepository->checkUser($data['email']);

            if($check != null){
                return redirect()->back()->with('error', 'thong tin da ton tai, vui long kiem tra lai!');
            }
            $this->customerRepository->update($data);

            return redirect()->back()->with('message', 'sua thanh cong !');
        }
        
        $this->customerRepository->update($data);

        return redirect()->back()->with('message', 'sua thanh cong !');
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $data = $request->all();
        $customer = $this->customerRepository->search($data);

        return view('admin.pages.customer.index', compact('customer', 'page'));
    }
}
