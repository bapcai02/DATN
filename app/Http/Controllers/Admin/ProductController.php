<?php

namespace App\Http\Controllers\Admin;

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
    
    public function index(Request $request)
    {
        $page = $request->page;
        $brand = $this->brandRepository->get();
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->getByAdmin();
    
        return view('admin.pages.product.admin', compact(
            'brand', 'category', 'product', 'page'
        ));
    }

    public function search(Request $request)
    {
        $brand = $this->brandRepository->get();
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->searchAdmin($request->all());
        $page = $request->page;
    
        return view('admin.pages.product.admin', compact(
            'brand', 'category', 'product', 'page'
        ));
    }
}
