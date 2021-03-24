<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CouponRepository;

class CouponController extends Controller
{
    protected $couponRepository;

    public function __construct(
        CouponRepository $couponRepository
    )
    {
        $this->couponRepository = $couponRepository;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $coupons = $this->couponRepository->getAll();

        return view('admin.pages.coupon.index', compact('coupons', 'page'));
    }

    public function delete(Request $request)
    {
        $this->couponRepository->delete($request->id);

        return redirect()->back()->with('message-coupon', 'xoa thanh cong');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $code = $this->couponRepository->check($data['code']);

        if($code != null){
            return redirect()->back()->with('error-coupon', 'ma giam gia da duoc tao, vui long kiem tra lai !');
        }
        $this->couponRepository->create($data);
        return redirect()->back()->with('message-coupon', 'them moi thanh cong');
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $code = $this->couponRepository->check($data['code']);
        $coupon = $this->couponRepository->getById($data['id']);

        if($coupon->code != $data['code']){
            if($code != null){
                return redirect()->back()->with('error-coupon', 'ma giam gia da duoc tao, vui long kiem tra lai !');
            }
            $this->couponRepository->update($data);

            return redirect()->back()->with('message-coupon', 'chinh sua thanh cong');
        }

        $this->couponRepository->update($data);

        return redirect()->back()->with('message-coupon', 'chinh sua thanh cong');
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $coupons = $this->couponRepository->search($request->all());

        return view('admin.pages.coupon.index', compact('coupons', 'page'));
    }
}
