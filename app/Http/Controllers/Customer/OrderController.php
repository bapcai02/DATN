<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\OrderRepository;
use App\Repositories\AddressRepository;
use App\Repositories\CategoryRepository;
use Excel;
use App\Exports\OrderExport;
use Auth;

class OrderController extends Controller
{
    protected $orderRepository;
    
    public function __construct(
        OrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $order = $this->orderRepository->getOrderByCustomer(Auth::user()->id);
        
        return view('admin.pages.orders.customer', compact('page', 'order'));
    }
    
    public function search(Request $request)
    {
        $page = $request->page;
        $data = $request->all();
        $order = $this->orderRepository->search($data);
        
        return view('admin.pages.orders.customer',compact('order', 'page'));
    }

    public function getOrderDetails($id)
    {
        $customerInfo =  $this->orderRepository->getInfor($id);
        $billInfo = $this->orderRepository->getById($id);

        return view('admin.pages.orders.orderDetails', compact('customerInfo', 'billInfo'));
    }

    public function export()
    {
        return Excel::download(new OrderExport, 'OrderExport.xlsx');
    }
}
