<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\AddressRepository;
use App\Repositories\UserCartRepository;
use App\Repositories\CouponRepository;
use Cart;
use Auth;
use DB;

class CartController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    protected $addressRepository;
    protected $userCartRepository;
    protected $couponRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        AddressRepository $addressRepository,
        UserCartRepository $userCartRepository,
        CouponRepository $couponRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->addressRepository = $addressRepository;
        $this->userCartRepository = $userCartRepository;
        $this->couponRepository = $couponRepository;
    }
    public function index(Request $request){
        $category = $this->categoryRepository->getListCategory()->get();

        if(Auth::check()){
            $user_cart = $this->userCartRepository->getById(Auth::user()->id);
            return view('fontend.pages.carts.index', compact('category', 'user_cart'));
        }
        $cart = Cart::content();

        return view('fontend.pages.carts.index', compact('category', 'cart'));
    }

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

    public function deleteCart(Request $request){
        $rowId = $request->rowId;
        Cart::remove($rowId);

        return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
    }

    public function updateCart(Request $request){
        $data = $request->data;
        foreach($data as $key => $value){
            Cart::update($value[1], $value[0]);
        }
        $message = 'update thành công';
        return response()->json($message);
    }

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

    public function checkout(int $id){
        $category = $this->categoryRepository->getListCategory()->get();
        $tinhThanhPho = $this->addressRepository->getTinhThanhPho();
        $cartUser = $this->userCartRepository->GetCart(Auth::user()->id, $id);

        return view('fontend.pages.carts.checkout', compact('category', 'tinhThanhPho', 'cartUser'));
    }

    public function getQuanHuyen(Request $request){
        $matp = $request->matp;
        $data = $this->addressRepository->getQuanHuyen($matp);

        return response()->json($data);
    }

    public function getXaPhuong(Request $request){
        $maqh = $request->maqh;
        $data = $this->addressRepository->getXaPhuong($maqh);
        
        return response()->json($data);
    }
}
