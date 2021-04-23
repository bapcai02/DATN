<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryInterface as CategoryInterface;
use DB;

class CategoryRepository implements CategoryInterface
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

    public function delete(int $id)
    {
        return $this->category->where('id', $id)->delete();
    }

    public function check($value)
    {
        return $this->category->where('category_name', $value)->first();
    }

    public function getOne($id)
    {
        return $this->category->where('id', $id)->first();
    }

    public function create($data)
    {
        return $this->category->create([
            'category_name' => $data['name'],
            'category_status' => $data['status'],
            'category_keyword'=>$data['key'],
            'category_description' => $data['description']
        ]);
    }

    public static function checkCategoryName(int $id)
    {
        return DB::table('categories')->where('id', $id)->first();
    }
    
    public function update($data)
    {
        return $this->category->where('id', $data['id'])->update([
            'category_name' => $data['name'],
            'category_status' => $data['status'],
            'category_keyword'=>$data['key'],
            'category_description' => $data['description']
        ]);
    }

    public function search($data)
    {
        $start_date = isset($data['start-date']) ? $data['start-date'] . "00:00:00" : false;
        $end_date = isset($data['end-date']) ? $data['end-date'] . "00:00:00" : false;
        $name = isset($data['customer']) ? $data['customer'] : false;
        $status = isset($data['status']) ? $data['status'] : false;

        return $this->category
        ->when($name, function ($query) use ($name) {
            return $query->Where('category_name', 'LIKE', "%$name%");
        })
        ->when($start_date, function ($query) use ($start_date) {
            return $query->WhereDate('created_at', '>=', $start_date);
        })
        ->when($end_date, function ($query) use ($end_date) {
            return $query->WhereDate('created_at', '<=', $end_date);
        })
        ->when($status, function ($query) use ($status) {
            return $query->Where('category_status', $status);
        })
        ->orderBy('created_at')
        ->paginate(6);
    }
}
