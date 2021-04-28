<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CouponInterface;

class CouponController extends Controller
{
    protected $couponInterface;

    public function __construct(
        CouponInterface $couponInterface
    )
    {
        $this->couponInterface = $couponInterface;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $coupons = $this->couponInterface->getAll();

        return view('admin.pages.coupon.index', compact('coupons', 'page'));
    }

    public function delete(Request $request)
    {
        $this->couponInterface->delete($request->id);

        return redirect()->back()->with('message-coupon', 'xoa thanh cong');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $code = $this->couponInterface->check($data['code']);

        if($code != null){
            return redirect()->back()->with('error-coupon', 'ma giam gia da duoc tao, vui long kiem tra lai !');
        }
        $this->couponInterface->create($data);
        return redirect()->back()->with('message-coupon', 'them moi thanh cong');
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $code = $this->couponInterface->check($data['code']);
        $coupon = $this->couponInterface->getById($data['id']);

        if($coupon->code != $data['code']){
            if($code != null){
                return redirect()->back()->with('error-coupon', 'ma giam gia da duoc tao, vui long kiem tra lai !');
            }
            $this->couponInterface->update($data);

            return redirect()->back()->with('message-coupon', 'chinh sua thanh cong');
        }

        $this->couponInterface->update($data);

        return redirect()->back()->with('message-coupon', 'chinh sua thanh cong');
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $coupons = $this->couponInterface->search($request->all());

        return view('admin.pages.coupon.index', compact('coupons', 'page'));
    }
}
