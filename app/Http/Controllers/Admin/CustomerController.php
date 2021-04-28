<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CustomerInterface;
use App\Repositories\Contracts\UserInterface;

/**
 * CustomerController
 * 
 * @property App\Repositories\Contracts\CustomerInterface
 * @property App\Repositories\Contracts\UserInterface
 */
class CustomerController extends Controller
{
    protected $customerInterface;
    protected $userInterface;

    /**
     * CustomerController construct
     * 
     * @property CustomerInterface $customerInterface
     * @property UserInterface $userInterface
     */
    public function __construct(
        CustomerInterface $customerInterface,
        UserInterface $userInterface
    )
    {
        $this->customerInterface = $customerInterface;
        $this->userInterface = $userInterface;
    }

    /**
     * function index
     * 
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $page = $request->page;
        $customer = $this->customerInterface->getListCustomer()->paginate(6);
       
        return view('admin.pages.customer.index', compact('customer', 'page'));
    }

    /**
     * function create
     * 
     * @param Request $request
     * @return redirect
     */
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

    /**
     * function delete
     * 
     * @param Request $request
     * @return redirect
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $this->customerInterface->delete($id);

        return redirect()->back()->with('message', 'xoa thanh thanh cong !');
    }

    /**
     * function edit
     * 
     * @param Request $request
     * @return redirect
     */
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

    /**
     * function search
     * 
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $page = $request->page;
        $data = $request->all();
        $customer = $this->customerInterface->search($data);

        return view('admin.pages.customer.index', compact('customer', 'page'));
    }
}
