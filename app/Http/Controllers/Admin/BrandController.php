<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;

class BrandController extends Controller
{
    protected $brandRepository;
    
    public function __construct(
        BrandRepository $brandRepository
    )
    {
        $this->brandRepository = $brandRepository;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $brand = $this->brandRepository->getAll();
        
        return view('admin.pages.brands.index', compact('brand', 'page'));
    }

    public function delete(Request $request)
    {
        $this->brandRepository->delete($request->id);

        return redirect()->back()->with('message-brand', 'xoa thanh cong');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $code = $this->brandRepository->check($data['name']);

        if($code != null){
            return redirect()->back()->with('error-brand', 'ten nhan hieu da duoc tao, vui long kiem tra lai !');
        }
        $this->brandRepository->create($data);
        return redirect()->back()->with('message-brand', 'them moi thanh cong');
    }

    public function edit(Request $request)
    {
        
        $data = $request->all();
        $name = $this->brandRepository->check($data['name']);
        $brand = $this->brandRepository->getById($data['id']);

        if($brand->brand_name != $data['name']){
            if($name != null){
                return redirect()->back()->with('error-brand', 'ten nhan hieu duoc tao, vui long kiem tra lai !');
            }
            $this->brandRepository->update($data);

            return redirect()->back()->with('message-brand', 'chinh sua thanh cong');
        }

        $this->brandRepository->update($data);

        return redirect()->back()->with('message-brand', 'chinh sua thanh cong');
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $brand = $this->brandRepository->search($request->all());

        return view('admin.pages.brands.index', compact('brand', 'page'));
    }
}
