<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Rating;
use DB;

class ProductRepository
{
    protected $product;
    protected $productImage;
    protected $productTag;
    protected $rating;

    public function __construct(
        Product $product,
        ProductImage $productImage,
        ProductTag $productTag,
        Rating $rating
    )
    {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->rating = $rating;
    }

    public function getListProduct()
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.id', 'products.product_name', 'products.product_desc', 
                'products.product_price', 'products.sale','products.product_status',
                'categories.category_name')
            ->where('products.product_status', 1)
            ->orderBy('products.created_at', 'DESC');
    }

    public function getProductById(int $id)
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->where('products.product_status', 1)
            ->where('products.id', $id)
            ->orderBy('products.created_at', 'DESC');
    }

    public function getProductImageById(int $id)
    {
        return DB::table('products')
            ->join('product_images', 'products.id', 'product_images.product_id')
            ->where('product_status', 1)
            ->where('products.id', $id);
    }

    public function getRatingImageById(int $id)
    {
        $rating = $this->rating->where('product_id', $id)->get();
        $total_rail = 0;
        $count = count($rating);
        foreach($rating as $value){
            $total_rail += ($value->rating) / $count;
        }
        return $total_rail;
    }

    public function getProductTag(int $id)
    {
        
    }

    public function create($data)
    {
        
    }
    public function delete(int $id)
    {
        $this->productImage->where('product_id', $id)->delete();
        return $this->product->where('id', $id)->delete();
    }
    public function getProductByCustomer(int $id)
    {
        return $this->product
        ->join('sellers', 'products.seller_id', 'sellers.id')
        ->join('customers', 'sellers.customer_id', 'customers.id')
        ->where('customers.user_id', $id)
        ->select('products.id', 'products.product_name', 'products.product_desc', 
                'products.product_price', 'products.sale','products.product_status',
                'products.product_content','products.category_id', 'products.brand_id',
                'products.seller_id')
        ->paginate(6);
    }

    public function getProductByCategoryId(int $id){
        return $this->product
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.id', 'products.product_name', 'products.product_desc', 
                'products.product_price', 'products.sale','products.product_status',
                'categories.category_name')
            ->where('products.product_status', 1)
            ->where('category_id', $id)
            ->orderBy('products.created_at')
            ->paginate(9);
    }

    public function Search(string $text){
        return $this->product
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.id', 'products.product_name', 'products.product_desc', 
                'products.product_price', 'products.sale','products.product_status',
                'categories.category_name')
            ->where('products.product_status', 1)
            ->where('product_name', 'LIKE', "%$text%")
            ->orderBy('products.created_at')
            ->paginate(9);
    }

    public static function getImage($id){ 
        return DB::table('product_images')->where('product_id', $id)->select('image')->first();
    }

    public function searchProductCustomer($data, $customer_id)
    {
       
        $date = isset($data['date']) ? $data['date'] . ' ' . "00:00:00" : false;
        $product_name = isset($data['product_name']) ? $data['product_name'] : false;
        $brand = isset($data['brand']) ? $data['brand'] : false;
        $category =  isset($data['category']) ? $data['category'] : false;

        return $this->product
            ->join('sellers', 'products.seller_id', 'sellers.id')
            ->join('customers', 'sellers.customer_id', 'customers.id')
            ->where('customers.user_id', $customer_id)
            ->select('products.id', 'products.product_name', 'products.product_desc', 
                    'products.product_price', 'products.sale','products.product_status',
                    'products.product_content','products.category_id', 'products.brand_id',
                    'products.seller_id')
            ->when($date, function ($query) use ($date) {
                return $query->whereDate('created', $date);
            })
            ->when($product_name, function ($query) use ($product_name) {
                return $query->where('product_name','LIKE', "%$product_name%");
            })
            ->when($brand, function ($query) use ($brand) {
                return $query->where('brand_id', $brand);
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('category_id', $category);
            })
            ->paginate(6);
    }
}
