<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

/**
 * Class CategoryController
 * @property \App\Repositories\CategoryRepository
 * @property \App\Repositories\ProductRepository
 */

class CategoryController extends Controller
{
    /**
     * Class CategoryController construct
     * @property CategoryRepository $categoryRepository
     * @property ProductRepository $productRepository
     */

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

    /** function index
     * @property int $id
     * @return $category, $product_category
     */
    public function index(int $id){
        $category = $this->categoryRepository->getListCategory()->get();
        $product_category = $this->productRepository->getProductByCategoryId($id);

        return view('fontend.pages.categories.index', compact('category', 'product_category'));
    }

    /** function FilterByPrice
     * @property Request $request
     * @return $category, $product_category
     */
    public function FilterByPrice(Request $request)
    {
        $category = $this->categoryRepository->getListCategory()->get();
        $product_category = $this->productRepository->FilterProductByPrice($request->all());
        
        return view('fontend.pages.categories.index', compact('category', 'product_category'));
    }
}
