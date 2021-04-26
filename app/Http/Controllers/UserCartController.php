<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\AddressRepository;
use App\Repositories\UserCartRepository;
use App\Repositories\OrderRepository;
use Cart;
use Product;
use Auth;
use DB;

/** UserCartController
 * @property App\Repositories\CategoryRepository
 * @property App\Repositories\ProductRepository
 * @property App\Repositories\AddressRepository
 * @property App\Repositories\UserCartRepository
 * @property App\Repositories\OrderRepository
 * @property Cart
 */
class UserCartController extends Controller
{

    /** UserCartController __construct
     * @property CategoryRepository $categoryRepository
     * @property  ProductRepository $productRepository
     * @property  AddressRepository $addressRepository
     * @property  UserCartRepository $userCartRepository
     * @property  OrderRepository $orderRepository
     */
    protected $userCartRepository;
    protected $categoryRepository;
    protected $productRepository;
    protected $addressRepository;
    protected $orderRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        AddressRepository $addressRepository,
        UserCartRepository $userCartRepository,
        OrderRepository $orderRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->addressRepository = $addressRepository;
        $this->userCartRepository = $userCartRepository;
        $this->orderRepository = $orderRepository;
    }

    public function addCart(Request $request)
    {
        $product_id = $request ->productId;
        $product = DB::table('products')
                ->join('product_images', 'products.id', 'product_images.product_id')
                ->where('products.id', $product_id)
                ->first();

        if(Auth::check()){
            $user_id = Auth::user()->id;         
            $this->userCartRepository->addCart($product, $user_id);

            return redirect()->back()->with('message', 'Thêm Giỏ Hàng Thành Công');
        }
    }

    public function deleteCart(Request $request){
        $id = $request->id;
        $this->userCartRepository->delete($id);

        return redirect()->back()->with('message', 'Xóa sản phẩm thành công');
    }

    public function updateCart(Request $request)
    {
        $user_id = Auth::user()->id; 
        $data = $request->data;

        foreach($data as $key => $value){
            $cart = DB::table('carts')->where('id', $value[1])->first();
            if($cart->qty != $value[0]){
                DB::table('carts')->where('id', $value[1])->update([
                    'qty' => $value[0],
                    'price' => $cart->price * $value[0]
                ]);
            }
        }

        $message = 'update thành công';
        return response()->json($message);
    }
}
