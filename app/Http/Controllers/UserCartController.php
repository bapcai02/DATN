<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\AddressInterface;
use App\Repositories\Contracts\UserCartInterface;
use App\Repositories\Contracts\OrderInterface;
use Cart;
use Product;
use Auth;
use DB;

/** UserCartController
 * @property App\Repositories\Contracts\CategoryInterface
 * @property App\Repositories\Contracts\ProductInterface
 * @property App\Repositories\Contracts\AddressInterface
 * @property App\Repositories\Contracts\UserCartInterface
 * @property App\Repositories\Contracts\OrderInterface
 * @property Cart
 */
class UserCartController extends Controller
{

    /** UserCartController __construct
     * @property  CategoryInterface $categoryInterface
     * @property  ProductInterface $productInterface
     * @property  AddressInterface $addressInterface
     * @property  UserCartInterface $userCartInterface
     * @property  OrderInterface $orderInterface
     */
    protected $categoryInterface;
    protected $userCartInterface;
    protected $productInterface;
    protected $addressInterface;
    protected $orderInterface;

    public function __construct(
        CategoryInterface $categoryInterface,
        ProductInterface $productInterface,
        AddressInterface $addressInterface,
        UserCartInterface $userCartInterface,
        OrderInterface $orderInterface
    )
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->addressInterface = $addressInterface;
        $this->userCartInterface = $userCartInterface;
        $this->orderInterface = $orderInterface;
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
            $this->userCartInterface->addCart($product, $user_id);

            return redirect()->back()->with('message', 'Thêm Giỏ Hàng Thành Công');
        }
    }

    public function deleteCart(Request $request){
        $id = $request->id;
        $this->userCartInterface->delete($id);

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
