<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use DB;
use Auth;

class OrderRepository
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
    
    public function getAll(){
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

    public function getOrderByCustomer(int $id)
    {
        return DB::table('orders')
            ->join('order_details','orders.id', 'order_details.order_id')
            ->join('products','order_details.product_id', 'products.id')
            ->where('orders.customer_id', $id)
            ->select('products.product_name', 'products.id', 'orders.status', 'order_details.*')
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
}
