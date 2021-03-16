<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class DetailController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;;
    }
    public function index($id){
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->getProductById($id)->get();
        $productImage = $this->productRepository->getProductImageById($id)->get();
        $rating = $this->productRepository->getRatingImageById($id)->get();
        // dd($product);
        return view('fontend.pages.product.index', compact('category', 'product'));
    }
}
