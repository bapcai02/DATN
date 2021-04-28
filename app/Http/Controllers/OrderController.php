<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\OrderInterface;

/** OrderController
 * @property OrderInterface
 */
class OrderController extends Controller
{

    /** OrderController __construct
     * @property OrderInterface $orderInterface
     */
    protected $orderInterface;

    public function __construct(
        OrderInterface $orderInterface
    )
    {
        $this->orderInterface = $orderInterface;
    }

    /** function create
     * @property Request $request
     * @return message
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $this->orderInterface->addOrder($data);

        $message = "Thêm thành công";
    }
}
