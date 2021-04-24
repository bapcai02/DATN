<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SellerRepository;

/**
 * Class CustomerController
 * @property \App\Repositories\CategoryRepository
 * @property \App\Repositories\ProductRepository
 * @property \App\Repositories\SellerRepository
 */

class CustomerController extends Controller
{
    /**
     * CustomerController construct
     * @property  CategoryRepository $categoryRepository
     * @property  ProductRepository $productRepository
     * @property  SellerRepository $sellerRepository
     */

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

    /** function index
     * @property int $id
     * @return $category, $product, $seller
     */
    public function index(int $id)
    {
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->getBySeller($id);
        $seller = $this->sellerRepository->getById($id);

        return view('fontend.pages.customer.index',compact('category', 'product', 'seller'));
    }
}
