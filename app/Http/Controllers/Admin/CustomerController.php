<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    protected $customerRepository;

    public function __construct(
        CustomerRepository $customerRepository
    )
    {
        $this->customerRepository = $customerRepository;
    }
    public function index(Request $request){
        $page = $request->page;
        $customer = $this->customerRepository->getListCustomer()->paginate(6);

        return view('admin.pages.customer.index', compact('customer', 'page'));
    }
}
