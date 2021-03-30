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
        $brand = $this->brandRepository->get();
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->getProductByCustomer(Auth::user()->id);
        $page = $request->page;
    
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
        $this->productRepository->create($request->all());
    }
}
