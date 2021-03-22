<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request){
        $page = $request->page;
        $category = $this->categoryRepository->getListCategory()->paginate(6);

        return view('admin.pages.categories.index', compact('category', 'page'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $this->categoryRepository->delete($id);

        return redirect()->back()->with('message', 'xoa thanh cong !');
    }

    public function create(Request $request){
        $data = $request->all();
        $check = $this->categoryRepository->check($data['name']);

        if($check == null){
            $this->categoryRepository->create($data);

            return redirect()->back()->widh('message', 'them moi thanh cong !');
        }
        return redirect()->back()->with('error', 'category da duoc tao vui long kiem tra lai !');
    }

    public function edit(Request $request){
        $data = $request->all();
        $check = $this->categoryRepository->check($data['name']);

        if($check == null){
            $this->categoryRepository->update($data);

            return redirect()->back()->widh('message', 'them moi thanh cong !');
        }
        return redirect()->back()->with('error', 'category da duoc tao vui long kiem tra lai !');
    }
}
