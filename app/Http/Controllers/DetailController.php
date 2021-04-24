<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use DB;

/**
 * Class DetailController
 * @property \App\Repositories\CategoryRepository
 * @property \App\Repositories\ProductRepository
 */

class DetailController extends Controller
{
    /** 
     * Class DetailController construct
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
        $this->productRepository = $productRepository;
    }

    /** 
     * function index
     * @property Request $request
     * @property int $id
     * @return $category 
     * @return $product 
     * @return $productImage 
     * @return $rating 
     * @return $productRan 
     * @return $page 
     * @return $rating 
     */
    public function index(Request $request, int $id){
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

     /** 
     * function rating
     * @property Request $request
     * @return $message 
     */
    public function rating(Request $request)
    {
        $this->productRepository->rating($request->all());

        return response()->json('thành công');
    }
}
