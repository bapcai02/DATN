<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page;
        $customer = DB::table('customers')->where('user_id', Auth::user()->id)->first();
        $shop = DB::table('sellers')->paginate(6);

        return view('admin.pages.shops.index', compact('page', 'shop'));
    }

    public function create(Request $request)
    {
        $customer = DB::table('customers')->where('user_id', Auth::user()->id)->first();

        DB::table('sellers')->insert([
            'customer_id' => $customer->id,
            'shop_info' => $request->info,
            'shop_name' => $request->name
        ]);

        $message = 'Thêm mới thành công';

        return redirect()->back()->with('message', $message);
    }

    public function edit(Request $request)
    {
        $customer = DB::table('customers')->where('user_id', Auth::user()->id)->select('ShopID')->first();
    }

    public function delete(Request $requets)
    {

    }

    public function search(Request $request)
    {

    }

    public static function chekShip($id)
    {
        return DB::table('ships')->where('seller_id', $id)->select('ShopID')->first();
    }
}
