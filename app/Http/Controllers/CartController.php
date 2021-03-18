<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Cart;

class CartController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    public function index(){
        $category = $this->categoryRepository->getListCategory()->get();
        $cart = Cart::content();

        return view('fontend.pages.carts.index', compact('category', 'cart'));
    }

    public function addCart(Request $request){
        
        $product_id = $request ->productId;
        $product = $this->productRepository->getProductById($product_id)
                ->join('product_images', 'products.id', 'product_images.product_id')
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
}
