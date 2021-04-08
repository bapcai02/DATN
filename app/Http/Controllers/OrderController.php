<?php

namespace App\Http\Controllers;

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
    public function create(Request $request)
    {
        $data = $request->all();
        $this->orderRepository->addOrder($data);

        $message = "Thêm thành công";
        ;
    }
}
