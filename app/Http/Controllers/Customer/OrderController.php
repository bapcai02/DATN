<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Contracts\EmployeeInterface;
use App\Repositories\Contracts\OrderInterface;
use App\Repositories\Contracts\AddressInterface;
use App\Repositories\Contracts\CategoryInterface;
use Excel;
use App\Exports\OrderExport;
use Auth;

/**
 * OrderController
 * 
 * @property App\Repositories\Contracts\OrderInterface;
 */
class OrderController extends Controller
{
    /**
     * OrderController construct
     * 
     * @param OrderInterface $orderInterface
     */
    protected $orderInterface;
    
    public function __construct(
        OrderInterface $orderInterface
    )
    {
        $this->orderInterface = $orderInterface;
    }

    /**
     * function index
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $page = $request->page;
        $order = $this->orderInterface->getOrderByCustomer(Auth::user()->id);
        
        return view('admin.pages.orders.customer', compact('page', 'order'));
    }
    
    /**
     * function search
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $page = $request->page;
        $data = $request->all();
        $order = $this->orderInterface->search($data);
        
        return view('admin.pages.orders.customer',compact('order', 'page'));
    }

    /**
     * function getOrderDetails
     * @param Request $request
     * @return view
     */
    public function getOrderDetails($id)
    {
        $customerInfo =  $this->orderInterface->getInfor($id);
        $billInfo = $this->orderInterface->getById($id);

        return view('admin.pages.orders.orderDetails', compact('customerInfo', 'billInfo'));
    }

    /**
     * function export
     * @return dowload
     */
    public function export()
    {
        return Excel::download(new OrderExport, 'OrderExport.xlsx');
    }
}
