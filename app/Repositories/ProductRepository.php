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
            ->join('product_images', 'products.id', 'product_images.product_id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->where('product_status', 1)
            ->orderBy('products.created_at', 'DESC');
    }

    public function getProductById(int $id)
    {
        return DB::table('products')
            ->join('product_images', 'products.id', 'product_images.product_id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->where('product_status', 1)
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

    }
}
