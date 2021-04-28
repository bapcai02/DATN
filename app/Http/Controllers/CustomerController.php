<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\SellerInterface;

/**
 * Class CustomerController
 * @property \App\Repositories\Contracts\CategoryInterface
 * @property \App\Repositories\Contracts\ProductInterface
 * @property \App\Repositories\Contracts\SellerInterface
 */

class CustomerController extends Controller
{
    /**
     * CustomerController construct
     * @property  CategoryInterface $categoryInterface
     * @property  ProductInterface $productInterface
     * @property  SellerInterface $sellerInterface
     */

    protected $categoryInterface;
    protected $productInterface;
    protected $sellerInterface;

    public function __construct(
        CategoryInterface $categoryInterface,
        ProductInterface $productInterface,
        SellerInterface $sellerInterface
    )
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->sellerInterface = $sellerInterface;
    }

    /** function index
     * @property int $id
     * @return $category, $product, $seller
     */
    public function index(int $id)
    {
        $category = $this->categoryInterface->getListCategory()->get();
        $product = $this->productInterface->getBySeller($id);
        $seller = $this->sellerInterface->getById($id);

        return view('fontend.pages.customer.index',compact('category', 'product', 'seller'));
    }
}
