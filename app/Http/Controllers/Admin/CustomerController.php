<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CustomerInterface;
use App\Repositories\Contracts\UserInterface;

class CustomerController extends Controller
{
    protected $customerInterface;
    protected $userInterface;

    public function __construct(
        CustomerInterface $customerInterface,
        UserInterface $userInterface
    )
    {
        $this->customerInterface = $customerInterface;
        $this->userInterface = $userInterface;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $customer = $this->customerInterface->getListCustomer()->paginate(6);
       
        return view('admin.pages.customer.index', compact('customer', 'page'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $check =  $this->customerInterface->check($data['name']);
        $checkEmail = $this->userInterface->checkUser($data['email']);
        if($check != null || $checkEmail != null){
            return redirect()->back()->with('error', 'thong tin da ton tai, vui long kiem tra lai!');
        }
        $this->customerInterface->create($data);

        return redirect()->back()->with('message', 'them moi thanh cong !');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $this->customerInterface->delete($id);

        return redirect()->back()->with('message', 'xoa thanh thanh cong !');
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $customer = $this->customerInterface->getById($data['id']);
        $user = $this->userInterface->getById($customer->user_id);
       
        if($user->email != $data['email']){

            $check= $this->userInterface->checkUser($data['email']);

            if($check != null){
                return redirect()->back()->with('error', 'thong tin da ton tai, vui long kiem tra lai!');
            }
            $this->customerInterface->update($data);

            return redirect()->back()->with('message', 'sua thanh cong !');
        }
        
        $this->customerInterface->update($data);

        return redirect()->back()->with('message', 'sua thanh cong !');
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $data = $request->all();
        $customer = $this->customerInterface->search($data);

        return view('admin.pages.customer.index', compact('customer', 'page'));
    }
}
