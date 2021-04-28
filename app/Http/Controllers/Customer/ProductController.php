<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\BrandInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\SellerInterface;
use Auth;

/**
 * ProductController
 * 
 * @property App\Repositories\Contracts\ProductInterface
 * @property App\Repositories\Contracts\BrandInterface
 * @property App\Repositories\Contracts\CategoryInterface
 * @property App\Repositories\Contracts\SellerInterface
 */

class ProductController extends Controller
{
    /**
     * ProductController construct
     * 
     * @param BrandInterface $brandInterface
     * @param ProductInterface $productInterface
     * @param CategoryInterface $categoryInterface
     * @param SellerInterface $sellerInterface
     */
    protected $brandInterface;
    protected $productInterface;
    protected $categoryInterface;
    protected $sellerInterface;

    public function __construct(
        BrandInterface $brandInterface,
        ProductInterface $productInterface,
        CategoryInterface $categoryInterface,
        SellerInterface $sellerInterface
    )
    {
        $this->brandInterface = $brandInterface;
        $this->productInterface = $productInterface;
        $this->categoryInterface = $categoryInterface;
        $this->sellerInterface = $sellerInterface;
    }

    /**
     * function index
     * 
     * @param Request $request
     * @return view
     */
    public function index(Request $request){
        $page = $request->page;
        $brand = $this->brandInterface->get();
        $category = $this->categoryInterface->getListCategory()->get();
        $product = $this->productInterface->getProductByCustomer(Auth::user()->id);
    
        return view('admin.pages.product.index', compact(
            'brand', 'category', 'product', 'page'
        ));
    }

    /**
     * function delete
     * 
     * @param Request $request
     * @return redirect
     */
    public function delete(Request $request)
    {
        $this->productInterface->delete($request->id);

        return redirect()->back()->with('message', 'xoa thanh cong');
    }

     /**
     * function search
     * 
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $brand = $this->brandInterface->get();
        $category = $this->categoryInterface->getListCategory()->get();
        $product = $this->productInterface->searchProductCustomer($request->all(), Auth::user()->id);
        $page = $request->page;
    
        return view('admin.pages.product.index', compact(
            'brand', 'category', 'product', 'page'
        ));
    }

     /**
     * function add
     * 
     * @param Request $request
     * @return view
     */
    public function add(Request $request)
    {
        $brand = $this->brandInterface->get();
        $category = $this->categoryInterface->getListCategory()->get();
        $seller = $this->sellerInterface->getByCustomerId(Auth::user()->id);
        
        return view('admin.pages.product.create', compact('brand', 'category', 'seller'));
    }

     /**
     * function create
     * 
     * @param Request $request
     * @return redirect
     */
    public function create(Request $request)
    {

        $file1 = $request->file('image1');
        $file2 = $request->file('image2');
        $file3 = $request->file('image3');
        $file4 = $request->file('image4');

        $file_name1 = $file1->getClientOriginalName();
        $file_name2 = $file2->getClientOriginalName();
        $file_name3 = $file3->getClientOriginalName();
        $file_name4 = $file4->getClientOriginalName();

        $file1->move('assets/images', $file_name1);
        $file2->move('assets/images', $file_name2);
        $file3->move('assets/images', $file_name3);
        $file4->move('assets/images', $file_name4);

        $this->productInterface->create($request->all(), Auth::user()->id, $file_name1,  $file_name2, $file_name3, $file_name4);

        return redirect()->back()->with('message', 'them moi thanh cong');
    }
}
