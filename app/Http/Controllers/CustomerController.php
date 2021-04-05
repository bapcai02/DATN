<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SellerRepository;

class CustomerController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    protected $sellerRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        SellerRepository $sellerRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->sellerRepository = $sellerRepository;
    }
    public function index($id)
    {
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->getBySeller($id);
        $seller = $this->sellerRepository->getById($id);

        return view('fontend.pages.customer.index',compact('category', 'product', 'seller'));
    }
}
