<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BrandInterface;

/**
 * BrandController
 * 
 * @property App\Repositories\Contracts\BrandInterface
 */
class BrandController extends Controller
{
    protected $brandInterface;
    
    public function __construct(
        BrandInterface $brandInterface
    )
    {
        $this->brandInterface = $brandInterface;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $brand = $this->brandInterface->getAll();
        
        return view('admin.pages.brands.index', compact('brand', 'page'));
    }

    public function delete(Request $request)
    {
        $this->brandInterface->delete($request->id);

        return redirect()->back()->with('message-brand', 'xoa thanh cong');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $code = $this->brandInterface->check($data['name']);

        if($code != null){
            return redirect()->back()->with('error-brand', 'ten nhan hieu da duoc tao, vui long kiem tra lai !');
        }
        $this->brandInterface->create($data);
        return redirect()->back()->with('message-brand', 'them moi thanh cong');
    }

    public function edit(Request $request)
    {
        
        $data = $request->all();
        $name = $this->brandInterface->check($data['name']);
        $brand = $this->brandInterface->getById($data['id']);

        if($brand->brand_name != $data['name']){
            if($name != null){
                return redirect()->back()->with('error-brand', 'ten nhan hieu duoc tao, vui long kiem tra lai !');
            }
            $this->brandInterface->update($data);

            return redirect()->back()->with('message-brand', 'chinh sua thanh cong');
        }

        $this->brandInterface->update($data);

        return redirect()->back()->with('message-brand', 'chinh sua thanh cong');
    }

    public function search(Request $request)
    {
        $page = $request->page;
        $brand = $this->brandInterface->search($request->all());

        return view('admin.pages.brands.index', compact('brand', 'page'));
    }
}
