<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\OrderInterface;

/**
 * OrderController
 * 
 * @property App\Repositories\Contracts\OrderInterface
 */
class OrderController extends Controller
{
    protected $orderInterface;

    /**
     * OrderController onstruct
     * 
     * @property  OrderInterface $orderInterface
     */
    public function __construct(
        OrderInterface $orderInterface
    )
    {
        $this->orderInterface = $orderInterface;
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
        $order = $this->orderInterface->getByAdmin();

        return view('admin.pages.orders.index',compact('order', 'page'));
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
        $order = $this->orderInterface->search($data);
        
        return view('admin.pages.orders.index',compact('order', 'page'));
    }
}
