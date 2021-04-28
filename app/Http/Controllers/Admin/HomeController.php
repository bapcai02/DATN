<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * function index
     * 
     * @param Request $request
     * @return view
     */
    public function index(Request $request){

        return view('admin.pages.home.index');
    }
}
