<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\AddressInterface;
use App\Repositories\Contracts\UserCartInterface;
use App\Repositories\Contracts\CouponInterface;
use Cart;
use Auth;
use DB;

/**
 * Class CartController
 * @property \App\Repositories\Contracts\CategoryInterface
 * @property \App\Repositories\Contracts\ProductInterface
 * @property \App\Repositories\Contracts\AddressInterface
 * @property \App\Repositories\Contracts\UserCartInterface
 * @property \App\Repositories\Contracts\CouponInterface
 * @property \App\Models\Cart
 */

class CartController extends Controller
{
    /** CartController __constructer
     * @property CategoryInterface $categoryInterface
     * @property ProductInterface $productInterface
     * @property AddressInterface $addressInterface
     * @property UserCartInterface $userCartInterface
     * @property CouponInterface $couponInterface
     */

    protected $categoryInterface;
    protected $productInterface;
    protected $addressInterface;
    protected $userCartInterface;
    protected $couponInterface;

    public function __construct(
        CategoryInterface $categoryInterface,
        ProductInterface $productInterface,
        AddressInterface $addressInterface,
        UserCartInterface $userCartInterface,
        CouponInterface $couponInterface
    )
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->addressInterface = $addressInterface;
        $this->userCartInterface = $userCartInterface;
        $this->couponInterface = $couponInterface;
    }

    /**
     * @property Request $request
     * @return $category, $cart
     */
    public function index(Request $request){
        $category = $this->categoryInterface->getListCategory()->get();

        if(Auth::check()){
            $user_cart = $this->userCartInterface->getById(Auth::user()->id);
            return view('fontend.pages.carts.index', compact('category', 'user_cart'));
        }
        $cart = Cart::content();

        return view('fontend.pages.carts.index', compact('category', 'cart'));
    }

    /** function addCart
     * @property $request
     * @return $message
     */
    public function addCart(Request $request){
        
        $product_id = $request ->productId;
        $product = DB::table('products')
                ->join('product_images', 'products.id', 'product_images.product_id')
                ->where('products.id', $product_id)
                ->first();

        Cart::add([
            'id' => $product_id, 
            'name' => $product->product_name, 
            'qty' => 1, 
            'price' => $product->product_price,
            'weight' => 0,
            'options' => [
                'sale' => $product->sale,
                'image' => $product->image
            ]
        ]);

        return redirect()->back()->with('message', 'Thêm Giỏ Hàng Thành Công');
    }

    /** function deleteCart
     * @property Request $request
     * @return $message
     */
    public function deleteCart(Request $request){
        $rowId = $request->rowId;
        Cart::remove($rowId);

        return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
    }

    /** function updateCart
     * @property Request $request
     * @return $message
     */
    public function updateCart(Request $request){
        $data = $request->data;
        foreach($data as $key => $value){
            Cart::update($value[1], $value[0]);
        }
        $message = 'update thành công';
        return response()->json($message);
    }

    /** function CartCoupon
     * @property Request $request
     * @return $message
     */
    public function CartCoupon(Request $request)
    {
        $code = $request->coupons;
        $coupon = DB::table('coupons')->where('code',$code)->where('qty', '!=', 0)->first();
        if($coupon != null){
            DB::table('coupons')->where('id',$coupon->id)
                ->update(['qty' => $coupon->qty-1]);
            if(!Auth::check()){
                $cart = Cart::content();
                foreach($cart as $value){
                    $price = $value->price - ($value->price * (($coupon->discount_number)/100));
                    $price = $price > 0 ? $price : 0 ;
                    Cart::update($value->rowId, ['price' => $price]);
                }
                $message = "thêm mã giảm giá thành công";
                
                return response()->json($message);
            }else{
                $user_cart =  DB::table('carts')->where('user_id',Auth::user()->id)->get();
                foreach($user_cart as $value){
                    $price = $value->price - ($value->price * (($coupon->discount_number)/100));
                    $price = $price > 0 ? $price : 0 ;

                    DB::table('carts')->where('user_id',Auth::user()->id)->update([
                        'price' => $price,
                    ]);
                }
                $message = "thêm mã giảm giá thành công";
                
                return response()->json($message);
            }
        }else{
            $message2='error';
            return response()->json($message2);
        }
    }

    /** function checkout
     * @property int $id
     * @return $category, $tinhThanhPho, $cartUser
     */
    public function checkout(int $id){
        $category = $this->categoryInterface->getListCategory()->get();
        $tinhThanhPho = $this->addressInterface->getTinhThanhPho();
        $cartUser = $this->userCartInterface->GetCart(Auth::user()->id, $id);

        return view('fontend.pages.carts.checkout', compact('category', 'tinhThanhPho', 'cartUser'));
    }

    /** function getQuanHuyen
     * @property Request $request
     * @return $data
     */
    public function getQuanHuyen(Request $request){
        $matp = $request->matp;
        $data = $this->addressInterface->getQuanHuyen($matp);

        return response()->json($data);
    }

    /** function getXaPhuong
     * @property Request $request
     * @return $data
     */
    public function getXaPhuong(Request $request){
        $maqh = $request->maqh;
        $data = $this->addressInterface->getXaPhuong($maqh);
        
        return response()->json($data);
    }
}
