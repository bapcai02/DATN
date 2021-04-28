<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SliderInterface;
use DB;

/**
 * SliderController
 * 
 * @property App\Repositories\Contracts\SliderInterface
 */
class SliderController extends Controller
{

    /**
     * SliderController construct
     * 
     * @param SliderInterface $sliderInterface
     */
    protected $sliderInterface;

    public function __construct(
        SliderInterface $sliderInterface
    )
    {
        $this->sliderInterface = $sliderInterface;
    }

    /**
     * function index
     * 
     * @param Request $request
     */
    public function index(Request $request)
    {
        $page = $request->page;
        $slider = $this->sliderInterface->getAll();
        $product = DB::table('products')->get();

        return view('admin.pages.sliders.index', compact('page', 'slider', 'product'));
    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        $this->sliderInterface->create($request->all());
        $message = 'Thêm mới thành công';

        return redirect()->back()->with('message',$message);
    }

    public function delete(Request $request)
    {
        $this->sliderInterface->delete($request->id);
        $message = 'Xóa thành công';

        return redirect()->back()->with('message',$message);
    }
}
