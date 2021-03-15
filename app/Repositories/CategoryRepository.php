<?php

namespace App\Repositories;

use App\Models\Category;
use DB;

class CategoryRepository
{
    protected $categories;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getListCategory()
    {
        return $this->category->orderBy('created_at', 'DESC');
    }

}
