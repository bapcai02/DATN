<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\OrderInterface;

class OrderController extends Controller
{
    protected $orderInterface;

    public function __construct(
        OrderInterface $orderInterface
    )
    {
        $this->orderInterface = $orderInterface;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $order = $this->orderInterface->getByAdmin();

        return view('admin.pages.orders.index',compact('order', 'page'));
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $data = $request->all();
        $order = $this->orderInterface->search($data);
        
        return view('admin.pages.orders.index',compact('order', 'page'));
    }
}
