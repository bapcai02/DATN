<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\AddressRepository;
use App\Repositories\UserCartRepository;
use Cart;
use Auth;

class UserCartController extends Controller
{
    protected $userCartRepository;
    protected $categoryRepository;
    protected $productRepository;
    protected $addressRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        AddressRepository $addressRepository,
        UserCartRepository $userCartRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->addressRepository = $addressRepository;
        $this->userCartRepository = $userCartRepository;
    }

    public function index()
    {

    }

    public function addCart(Request $request)
    {
        $product_id = $request ->productId;
        $product = $this->productRepository->getProductById($product_id)
                ->join('product_images', 'products.id', 'product_images.product_id')
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
        $qty = $request->qty;
        $id = $request->id;
    }
}
