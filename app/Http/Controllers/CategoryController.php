<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;

/**
 * Class CategoryController
 * @property \App\Repositories\Contracts\CategoryInterface
 * @property \App\Repositories\Contracts\ProductInterface
 */

class CategoryController extends Controller
{
    /**
     * Class CategoryController construct
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
        $this->productInterface = $productInterface;;
    }

    /** function index
     * @property int $id
     * @return $category, $product_category
     */
    public function index(int $id){
        $category = $this->categoryInterface->getListCategory()->get();
        $product_category = $this->productInterface->getProductByCategoryId($id);

        return view('fontend.pages.categories.index', compact('category', 'product_category'));
    }

    /** function FilterByPrice
     * @property Request $request
     * @return $category, $product_category
     */
    public function FilterByPrice(Request $request)
    {
        $category = $this->categoryInterface->getListCategory()->get();
        $product_category = $this->productInterface->FilterProductByPrice($request->all());
        
        return view('fontend.pages.categories.index', compact('category', 'product_category'));
    }
}
