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
        DB::table('sellers')->where('id', $request->id)->update([
            'shop_info' => $request->info,
            'shop_name' => $request->name
        ]);
        DB::table('ships')->where('seller_id', $request->id)->update([
            'shopID' => $request->shopID,
            'Token' => $request->token
        ]);

        $message = "Chỉnh sửa thành công";
        return redirect()->back()->with('message', $message);
    }

    public function delete(Request $request)
    {
        DB::table('sellers')->where('id', $request->id)->delete();
        $message = 'Xóa thành công';

        return redirect()->back()->with('message', $message);
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $shop = DB::table('sellers')->where('shop_name', "%$request->name%")->paginate(6);

        return view('admin.pages.shops.index', compact('page', 'shop'));
    }
}
