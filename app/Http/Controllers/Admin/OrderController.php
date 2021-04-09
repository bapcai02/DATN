<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;

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
        $order = $this->orderRepository->getByAdmin();

        return view('admin.pages.orders.index',compact('order', 'page'));
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $data = $request->all();
        $order = $this->orderRepository->search($data);
        
        return view('admin.pages.orders.index',compact('order', 'page'));
    }
}
