<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Contracts\SliderInterface;

/**
 * Class HomeController
 * @property \App\Repositories\Contracts\CategoryInterface
 * @property \App\Repositories\Contracts\ProductInterface
 * @property \App\Repositories\Contracts\SliderInterface
 */

class HomeController extends Controller
{
    /**
     * HomeController construct
     * @property CategoryInterface $categoryInterface
     * @property ProductInterface $productInterface
     * @property SliderInterface $sliderInterface
     */

    protected $categoryInterface;
    protected $productInterface;
    protected $sliderInterface;

    public function __construct(
        CategoryInterface $categoryInterface,
        ProductInterface $productInterface,
        SliderInterface $sliderInterface
    )
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->sliderInterface = $sliderInterface;
    }

    /**
     * function index
     * @property Request $request
     * @return $category
     * @return $product
     * @return $productMeat
     * @return $productFui
     * @return $productVeget
     * @return $productSea
     * @return $productDealWeek
     * @return $productFuiSale
     * @return $productSeaSale
     * @return $productSale
     * @return $productMeatRan
     * @return $productFuiRan
     * @return $productSeaRan
     * @return $productVegetRan
     * @return $productSeaRan
     * @return $productRan
     * @return $slider
     */

    public function index(Request $request)
    {
        $category = $this->categoryInterface->getListCategory()->get();
        $product = $this->productInterface->getListProduct()->limit(6)->get();
        $productMeat = $this->productInterface->getListProduct()->limit(6)->where('category_id', 1)->get();
        $productFui = $this->productInterface->getListProduct()->limit(6)->where('category_id', 3)->get();
        $productVeget = $this->productInterface->getListProduct()->limit(6)->where('category_id', 2)->get();
        $productSea = $this->productInterface->getListProduct()->limit(6)->where('category_id', 4)->get();
        $productDealWeek = $this->productInterface->getListProduct()->orderBy('sale', 'DESC')->limit(5)->get();
        $productMeatSale = $this->productInterface->getListProduct()->limit(6)->where('category_id', 1)->orderBy('sale', 'DESC')->get();
        $productFuiSale = $this->productInterface->getListProduct()->limit(6)->where('category_id', 3)->orderBy('sale', 'DESC')->get();
        $productVegetSale = $this->productInterface->getListProduct()->limit(6)->where('category_id', 2)->orderBy('sale', 'DESC')->get();
        $productSeaSale = $this->productInterface->getListProduct()->limit(6)->where('category_id', 4)->orderBy('sale', 'DESC')->get();
        $productSale = $this->productInterface->getListProduct()->orderBy('sale', 'DESC')->limit(6)->get();
        $productMeatRan = $this->productInterface->getListProduct()->limit(6)->where('category_id', 1)->inRandomOrder()->get();
        $productFuiRan = $this->productInterface->getListProduct()->limit(6)->where('category_id', 3)->inRandomOrder()->get();
        $productVegetRan = $this->productInterface->getListProduct()->limit(6)->where('category_id', 2)->inRandomOrder()->get();
        $productSeaRan = $this->productInterface->getListProduct()->limit(6)->where('category_id', 4)->inRandomOrder()->get();
        $productRan = $this->productInterface->getListProduct()->inRandomOrder()->limit(6)->get();
        $slider = $this->sliderInterface->get();

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
            'productRan',
            'slider'
        ));
    }

    /**
     * function search
     * @property  Request $request
     * @return $search
     * @return $category
     */
    public function search(Request $request)
    {
        $category = $this->categoryInterface->getListCategory()->get();
        $text = $request->text;   
        $search = $this->productInterface->Search($text);

        return view('fontend.pages.search.index', compact('search', 'category'));
    }

    /**
     * function about
     * @return $category
     */
    public function about()
    {
        $category = $this->categoryInterface->getListCategory()->get();
        return view('fontend.pages.home.about', compact('category'));
    }

    /**
     * function contact
     * @return $category
     */
    public function contact()
    {
        $category = $this->categoryInterface->getListCategory()->get();
        return view('fontend.pages.home.contacts', compact('category'));
    }
}
