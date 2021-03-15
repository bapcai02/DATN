<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class HomeController extends Controller
{
    public $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    public function index(Request $request){
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->getListProduct()->limit(6)->get();
        $productMeat = $this->productRepository->getListProduct()->limit(6)->where('category_id', 1)->get();
        $productFui = $this->productRepository->getListProduct()->limit(6)->where('category_id', 3)->get();
        $productVeget = $this->productRepository->getListProduct()->limit(6)->where('category_id', 2)->get();
        $productSea = $this->productRepository->getListProduct()->limit(6)->where('category_id', 4)->get();
        $productDealWeek = $this->productRepository->getListProduct()->orderBy('sale', 'DESC')->limit(5)->get();
        
        // dd($product);
        return view('fontend.pages.home.index', compact(
            'category', 
            'product', 
            'productMeat', 
            'productFui', 
            'productVeget', 
            'productSea',
            'productDealWeek'
        ));
    }
}
