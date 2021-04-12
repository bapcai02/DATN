<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use DB;

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
        $this->productRepository = $productRepository;
    }

    public function index(Request $request, $id){
        $page = $request->page;
        $category = $this->categoryRepository->getListCategory()->get();
        $product = $this->productRepository->getProductById($id)->first();
        $productImage = $this->productRepository->getProductImageById($id)->get();
        $rating = $this->productRepository->getRatingImageById($id);
        $productRan = $this->productRepository->getListProduct()->inRandomOrder()->limit(6)->get();
        $rating = $this->productRepository->getRating($id);

        return view('fontend.pages.product.index', compact(
                'category', 
                'product', 
                'productImage', 
                'rating',
                'productRan',
                'page',
                'rating'
            )
        );
    }

    public function rating(Request $request)
    {
        $this->productRepository->rating($request->all());

        return response()->json('thành công');
    }
}
