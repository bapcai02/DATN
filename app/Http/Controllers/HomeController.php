<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class HomeController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

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
        $productMeatSale = $this->productRepository->getListProduct()->limit(6)->where('category_id', 1)->orderBy('sale', 'DESC')->get();
        $productFuiSale = $this->productRepository->getListProduct()->limit(6)->where('category_id', 3)->orderBy('sale', 'DESC')->get();
        $productVegetSale = $this->productRepository->getListProduct()->limit(6)->where('category_id', 2)->orderBy('sale', 'DESC')->get();
        $productSeaSale = $this->productRepository->getListProduct()->limit(6)->where('category_id', 4)->orderBy('sale', 'DESC')->get();
        $productSale = $this->productRepository->getListProduct()->orderBy('sale', 'DESC')->limit(6)->get();
        $productMeatRan = $this->productRepository->getListProduct()->limit(6)->where('category_id', 1)->inRandomOrder()->get();
        $productFuiRan = $this->productRepository->getListProduct()->limit(6)->where('category_id', 3)->inRandomOrder()->get();
        $productVegetRan = $this->productRepository->getListProduct()->limit(6)->where('category_id', 2)->inRandomOrder()->get();
        $productSeaRan = $this->productRepository->getListProduct()->limit(6)->where('category_id', 4)->inRandomOrder()->get();
        $productRan = $this->productRepository->getListProduct()->inRandomOrder()->limit(6)->get();
  
        return view('fontend.pages.home.index', compact(
            'category', 
            'product', 
            'productMeat', 
            'productFui', 
            'productVeget', 
            'productSea',
            'productDealWeek',
            'productMeatSale',
            'productFuiSale',
            'productVegetSale',
            'productSeaSale',
            'productSale',
            'productMeatRan',
            'productFuiRan',
            'productSeaRan',
            'productVegetRan',
            'productSeaRan',
            'productRan'
        ));
    }

    public function search(Request $request)
    {
        $text = $request->text;   
    }
}
