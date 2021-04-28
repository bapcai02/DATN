<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryInterface;

    public function __construct(
        CategoryInterface $categoryInterface
    )
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function index(Request $request){
        $page = $request->page;
        $category = $this->categoryInterface->getListCategory()->paginate(6);

        return view('admin.pages.categories.index', compact('category', 'page'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $this->categoryInterface->delete($id);

        return redirect()->back()->with('message', 'xoa thanh cong !');
    }

    public function create(Request $request){
        $data = $request->all();
        $check = $this->categoryInterface->check($data['name']);

        if($check == null){
            $this->categoryInterface->create($data);

            return redirect()->back()->with('message', 'them moi thanh cong !');
        }
        return redirect()->back()->with('error', 'category da duoc tao vui long kiem tra lai !');
    }

    public function edit(Request $request){
        $data = $request->all();
        $check = $this->categoryInterface->check($data['name']);
        $category = $this->categoryInterface->getOne($data['id']);

        if($data['name'] == $category->category_name){
            $this->categoryInterface->update($data);
            return redirect()->back()->with('message', 'sua thanh cong !');
        }
        if($check == null){
            $this->categoryInterface->update($data);

            return redirect()->back()->with('message', 'sua thanh cong !');
        }
        return redirect()->back()->with('error', 'category da duoc tao vui long kiem tra lai !');
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $data = $request->all();
        $category = $this->categoryInterface->search($data);

        return view('admin.pages.categories.index', compact('category', 'page'));
    }
}
