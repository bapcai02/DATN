<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\SliderRepository;
use DB;

class SliderController extends Controller
{
    protected $sliderRepository;

    public function __construct(
        SliderRepository $sliderRepository
    )
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index(Request $request)
    {
        $page = $request->page;
        $slider = $this->sliderRepository->getAll();
        $product = DB::table('products')->get();

        return view('admin.pages.sliders.index', compact('page', 'slider', 'product'));
    }

    public function create(Request $request)
    {
        $this->sliderRepository->create($request->all());
        $message = 'Thêm mới thành công';

        return redirect()->back()->with('message',$message);
    }

    public function delete(Request $request)
    {
        $this->sliderRepository->delete($request->id);
        $message = 'Xóa thành công';

        return redirect()->back()->with('message',$message);
    }
}
