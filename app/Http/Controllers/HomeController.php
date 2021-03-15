<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
class HomeController extends Controller
{
    public $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index(Request $request){
        $category = $this->categoryRepository->getListCategory()->get();
        
        return view('fontend.pages.home.index', compact('category'));
    }
}
