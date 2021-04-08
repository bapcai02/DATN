<?php

namespace App\Repositories;

use App\Models\UserCart;
use DB;

class UserCartRepository
{
    protected $userCart;

    public function __construct(UserCart $userCart)
    {
        $this->userCart = $userCart;
    }
    
    public static function CountPrice(int $user_id){
        return DB::table('carts')->select(DB::raw("SUM(price) as totalPrice"))->where('user_id', $user_id)->first();
    }

    public function GetCart($user_id, int $product_id){
        return DB::table('carts')->select('product_id', 'price', 'name', 'qty')->where('product_id', $product_id)->where('user_id', $user_id)->first();
    }

    public function getById(int $user_id)
    {
        return $this->userCart->where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getAll(int $user_id)
    {
        return $this->userCart->where('user_id', $user_id)
            ->select('name', 'qty as quantity', 'price')
            ->orderBy('created_at', 'desc')->get();
    }

    public function check(string $code)
    {
        return $this->userCart->where('code', $code)->where('feature', 1)->first();
    }

    public function create($data, $user_id)
    {
        return $this->userCart->create([
            'user_id' => $user_id,
            'product_id' => $data->id,
            'name' => $data->name,
            'qty' => $data->qty,
            'price' => $data->price,
            'sale' => $data->options->sale,
            'image' => $data->options->image,
        ]);
    }

    public function addCart($product, $user_id)
    {
        return $this->userCart->create([
            'user_id' => $user_id,
            'product_id' => $product->id,
            'name' => $product->product_name,
            'qty' => 1,
            'price' => $product->product_price,
            'sale' => $product->sale,
            'image' => $product->image,
        ]);
    }
    public function update($qty, $user_id, $id)
    {
        return $this->userCart->where('id', $id)->where('user_id', $user_id)->update([
            'qty' => $data->qty,
        ]);
    }

    public function delete(int $id)
    {
        return $this->userCart->where('id', $id)->delete();
    }
}
