<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\OrderRepository;
use App\Repositories\AddressRepository;
use App\Repositories\CategoryRepository;
use Auth;

class OrderController extends Controller
{
    protected $userRepository;
    protected $orderRepository;
    protected $categoryRepository;
    
    public function __construct(
        OrderRepository $orderRepository,
        UserRepository $userRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $order = $this->orderRepository->getOrderByCustomer(Auth::user()->id);
        dd($order);
        
        return view('admin.pages.orders.customer');
    }
}
