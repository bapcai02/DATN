<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SellerRepository;
use Auth;

class ProductController extends Controller
{
    protected $brandRepository;
    protected $productRepository;
    protected $categoryRepository;
    protected $sellerRepository;

    public function __construct(
        BrandRepository $brandRepository,
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        SellerRepository $sellerRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->sellerRepository = $sellerRepository;
    }

    public function index(Request $request){
        $page = $request->page;
        $brand = $this->brandRepository->get();
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->getProductByCustomer(Auth::user()->id);
    
        return view('admin.pages.product.index', compact(
            'brand', 'category', 'product', 'page'
        ));
    }

    public function delete(Request $request)
    {
        $this->productRepository->delete($request->id);

        return redirect()->back()->with('message', 'xoa thanh cong');
    }

    public function search(Request $request)
    {
        $brand = $this->brandRepository->get();
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->searchProductCustomer($request->all(), Auth::user()->id);
        $page = $request->page;
    
        return view('admin.pages.product.index', compact(
            'brand', 'category', 'product', 'page'
        ));
    }

    public function add(Request $request)
    {
        $brand = $this->brandRepository->get();
        $category = $this->categoryRepository->getListCategory()->get();
        $seller = $this->sellerRepository->getByCustomerId(Auth::user()->id);
        
        return view('admin.pages.product.create', compact('brand', 'category', 'seller'));
    }

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

        $this->productRepository->create($request->all(), Auth::user()->id, $file_name1,  $file_name2, $file_name3, $file_name4);

        return redirect()->back()->with('message', 'them moi thanh cong');
    }
}
