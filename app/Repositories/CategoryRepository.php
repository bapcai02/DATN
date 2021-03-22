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

    public function delete(int $id){
        return $this->category->where('id', $id)->delete();
    }

    public function check($value){
        return $this->category->where('category_name', $value)->first();
    }

    public function create($data){
        return $this->category->create([
            'category_name' => $data['name'],
            'category_status' => $data['status'],
            'category_keyword'=>$data['key'],
            'category_description' => $data['description']
        ]);
    }

    public function update($data){
        return $this->category->update([
            'category_name' => $data['name'],
            'category_status' => $data['status'],
            'category_keyword'=>$data['key'],
            'category_description' => $data['description']
        ]);
    }
}
