<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;
    
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    { 
        $user = $this->userRepository->getUserByRole(1)->paginate(6);
        $page = $request->page;

        return view('admin.pages.user.index', compact('user', 'page'));
    }
}
