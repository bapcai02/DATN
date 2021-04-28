<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use DB;

/**
 * Class DetailController
 * @property \App\Repositories\Contracts\CategoryInterface
 * @property \App\Repositories\Contracts\ProductInterface
 */

class DetailController extends Controller
{
    /** 
     * Class DetailController construct
     * @property CategoryInterface $categoryInterface
     * @property ProductInterface $productInterface
     */

    protected $categoryInterface;
    protected $productInterface;

    public function __construct(
        CategoryInterface $categoryInterface,
        ProductInterface $productInterface
    )
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
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
        $category = $this->categoryInterface->getListCategory()->get();
        $product = $this->productInterface->getProductById($id)->first();
        $productImage = $this->productInterface->getProductImageById($id)->get();
        $rating = $this->productInterface->getRatingImageById($id);
        $productRan = $this->productInterface->getListProduct()->inRandomOrder()->limit(6)->get();
        $rating = $this->productInterface->getRating($id);

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
        $this->productInterface->rating($request->all());

        return response()->json('thành công');
    }
}
