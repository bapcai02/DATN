<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use DB;
use Auth;
use App\Repositories\Contracts\OrderInterface as OrderInterface;

class OrderRepository implements OrderInterface
{
    protected $order;
    protected $orderDetail;

    public function __construct(
        Order $order,
        OrderDetail $orderDetail
    )
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }
    
    public function getAll()
    {
        return $this->feeship->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getOrderByUser(int $id)
    {
        return DB::table('orders')
            ->join('order_details','orders.id', 'order_details.order_id')
            ->join('products','order_details.product_id', 'products.id')
            ->where('orders.user_id', $id)
            ->select('products.product_name', 'products.id', 'orders.status', 'order_details.product_id', 
                    'order_details.qty', 'order_details.address_ship','order_details.created_at', 'order_details.price')
            ->orderBy('orders.created_at', 'desc')
            ->paginate(6);
    }

    public function getById(int $id)
    {
        return DB::table('orders')
            ->join('order_details','orders.id', 'order_details.order_id')
            ->join('products','order_details.product_id', 'products.id')
            ->where('orders.id', $id)
            ->select('products.product_name', 'products.id', 'orders.status', 'order_details.product_id', 
                    'order_details.qty', 'order_details.address_ship','order_details.created_at', 'order_details.price')
            ->first();
    }

    public function getInfor(int $id)
    {
        $order =  DB::table('orders')->where('id', $id)->first();

        return DB::table('employer')->where('user_id', $order->user_id)->first();
    }

    public function getOrderByCustomer(int $id)
    {
        $customer = DB::table('customers')->where('user_id', $id)->first();

        return DB::table('orders')
            ->join('order_details','orders.id', 'order_details.order_id')
            ->where('orders.customer_id', $customer->id)
            ->orderBy('orders.created_at', 'desc')
            ->paginate(6);
    }

    public function addOrder($data)
    {
        $this->order->create([
            'Order_Code' => $data['order_code'],
            'user_id' => Auth::user()->id,
            'customer_id' => 1,
            'ship_id' => 1,
            'payment' => 0,
            'status' => 1,
        ]);

        $order = $this->order->where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->first();
        $cart = DB::table('carts')->where('id',$data['cart_id'])->first();

        $this->orderDetail->create([
            'order_id' => $order->id,
            'product_id' => $data['product_id'],
            'seller_id' => 1,
            'qty' => $cart->qty,
            'price' => $data['total'],
            'address_ship' => $data['address'],
        ]);

        DB::table('carts')->where('id',$data['cart_id'])->delete();
    }

    public function orderByPayment($orderCode, $data)
    {
        $this->order->create([
            'Order_Code' => $orderCode,
            'user_id' => Auth::user()->id,
            'customer_id' => 1,
            'ship_id' => 1,
            'payment' => 1,
            'status' => 1,
        ]);

        $order = $this->order->where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->first();
        $cart = DB::table('carts')->where('id',$data['cart_id'])->first();

        $this->orderDetail->create([
            'order_id' => $order->id,
            'product_id' => $data['product_id'],
            'seller_id' => 1,
            'qty' => $cart->qty,
            'price' => $data['total'],
            'address_ship' => $data['address'],
        ]);

        DB::table('carts')->where('id',$data['cart_id'])->delete();
    }

    public function getByAdmin()
    {
        return DB::table('orders')->join('order_details', 'orders.id', 'order_details.order_id')
                ->orderBy('orders.created_at', 'desc')
                ->paginate(6);
    }

    public function search($data)
    {
        $start_date = isset($data['start-date']) ? $data['start-date'] . ' ' . "00:00:00" : false;
        $end_date = isset($data['end-date']) ? $data['end-date'] . ' ' . "00:00:00" : false;
        $code = isset($data['code']) ? $data['code'] : false;
        $status = isset($data['status']) ? (int)($data['status']) : false;
  
        return  DB::table('orders')
            ->join('order_details', 'orders.id', 'order_details.order_id')
            ->when($code, function ($query) use ($code) {
                return $query->Where('orders.Order_Code', $code);
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('orders.status', "=", $status);
            })
            ->when($start_date, function ($query) use ($start_date) {
                return $query->WhereDate('orders.created_at', '>=', $start_date);
            })
            ->when($end_date, function ($query) use ($end_date) {
                return $query->WhereDate('orders.created_at', '<=', $end_date);
            })  
            ->orderBy('orders.created_at')
            ->paginate(6);
    }
}
