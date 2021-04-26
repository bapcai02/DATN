<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;

/** OrderController
 * @property OrderRepository
 */
class OrderController extends Controller
{

    /** OrderController __construct
     * @property OrderRepository $orderRepository
     */
    protected $orderRepository;

    public function __construct(
        OrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }

    /** function create
     * @property Request $request
     * @return message
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $this->orderRepository->addOrder($data);

        $message = "Thêm thành công";
    }
}
