<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserInterface;

class UserController extends Controller
{
    protected $userInterface;
    
    public function __construct(
        UserInterface $userInterface
    )
    {
        $this->userInterface = $userInterface;
    }

    public function index(Request $request)
    { 
        $user = $this->userInterface->getUserByRole(1)->paginate(6);
        $page = $request->page;

        return view('admin.pages.user.index', compact('user', 'page'));
    }
}
