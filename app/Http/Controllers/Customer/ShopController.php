<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class ShopController extends Controller
{
    /**
     * function index
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $page = $request->page;
        $shop = DB::table('sellers')->join('ships', 'sellers.id', 'ships.seller_id')->orderBy('sellers.created_at', 'desc')->paginate(6);
        
        return view('admin.pages.shops.index', compact('page', 'shop'));
    }

    /**
     * function create
     * @param Request $request
     * @return response
     */
    public function create(Request $request)
    {
        $customer = DB::table('customers')->where('user_id', Auth::user()->id)->first();

        DB::table('sellers')->insert([
            'customer_id' => $customer->id,
            'shop_info' => $request->info,
            'shop_name' => $request->name,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        $seller = DB::table('sellers')->orderBy('created_at', 'desc')->first();

        DB::table('ships')->insert([
            'seller_id' => $seller->id,
            'DistrictID' => $request->district_id,
            'ProvinceID' => $request->ward_code,
            'WardCode' => $request->ProvinceID,
            'shopID' => $request->shopid,
            'Token' => 'bf76117c-97a5-11eb-8be2-c21e19fc6803',
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        $message = 'Thêm mới thành công';

        return response()->json($message);
    }

    /**
     * function edit
     * @param Request $request
     * @return redirect
     */
    public function edit(Request $request)
    {
        DB::table('sellers')->where('id', $request->id)->update([
            'shop_info' => $request->info,
            'shop_name' => $request->name
        ]);

        $message = "Chỉnh sửa thành công";
        return redirect()->back()->with('message', $message);
    }

    /**
     * function delete
     * @param Request $request
     * @return redirect
     */
    public function delete(Request $request)
    {
        DB::table('sellers')->where('id', $request->id)->delete();
        $message = 'Xóa thành công';

        return redirect()->back()->with('message', $message);
    }

    /**
     * function delete
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $page = $request->page;
        $shop = DB::table('sellers')->where('shop_name', "%$request->name%")->paginate(6);

        return view('admin.pages.shops.index', compact('page', 'shop'));
    }
}
