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
        $product = $this->productRepository->getProductById($id)->first();
        $productImage = $this->productRepository->getProductImageById($id)->get();
        $rating = $this->productRepository->getRatingImageById($id);
        $productRan = $this->productRepository->getListProduct()->inRandomOrder()->limit(6)->get();

        return view('fontend.pages.product.index', compact(
                'category', 
                'product', 
                'productImage', 
                'rating',
                'productRan'
            )
        );
    }
}
