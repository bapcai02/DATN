<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();

    }
}
