<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use DB;

class ProductRepository
{
    protected $product;
    protected $productImage;
    protected $productTag;

    public function __construct(
        Product $product,
        ProductImage $productImage,
        ProductTag $productTag
    )
    {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
    }

    public function getListProduct()
    {
        return DB::table('products')
            ->join('product_images', 'products.id', 'product_images.product_id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->where('product_status', 1)
            ->orderBy('products.created_at', 'DESC');
    }

}
