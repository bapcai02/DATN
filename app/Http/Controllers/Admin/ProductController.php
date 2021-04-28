<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\BrandInterface;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\SellerInterface;
use Auth;

class ProductController extends Controller
{
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
    
    public function index(Request $request)
    {
        $page = $request->page;
        $brand = $this->brandInterface->get();
        $category = $this->categoryInterface->getListCategory()->get();
        $product = $this->productInterface->getByAdmin();
    
        return view('admin.pages.product.admin', compact(
            'brand', 'category', 'product', 'page'
        ));
    }

    public function search(Request $request)
    {
        $brand = $this->brandInterface->get();
        $category = $this->categoryInterface->getListCategory()->get();
        $product = $this->productInterface->searchAdmin($request->all());
        $page = $request->page;
    
        return view('admin.pages.product.admin', compact(
            'brand', 'category', 'product', 'page'
        ));
    }
}
