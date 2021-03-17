<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class CategoryController extends Controller
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
        $product_category = $this->productRepository->getProductByCategoryId($id);
        return view('fontend.pages.categories.index', compact('category', 'product_category'));
    }
}
