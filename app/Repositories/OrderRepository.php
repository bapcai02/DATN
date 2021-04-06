<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use DB;

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

    public function getById(int $id)
    {
        return $this->feeship->where('id', $id)->first();
    }


    public function search($data)
    { 
        $matp = isset($data['matp']) ? $data['matp'] : false;
        $maqh = isset($data['maqh']) ? $data['maqh'] : false;
        $maxptr = isset($data['maxptr']) ? $data['maxptr'] : false;
  
        return $this->feeship
        ->when($matp, function ($query) use ($matp) {
            return $query->Where('matp', $matp);
        })
        ->when($maqh, function ($query) use ($maqh) {
            return $query->where('maqh', $maqh);
        })
        ->when($maxptr, function ($query) use ($maxptr) {
            return $query->where('maxptr', $maxptr);
        })
        ->orderBy('created_at')
        ->paginate(6);
    }

    public function addOrder()
    {
        DB::table('orders')->update([
            
        ]);
    }
}
