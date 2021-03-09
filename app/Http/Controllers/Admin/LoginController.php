<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showlogin(){
        return view('admin.pages.auths.login');
    }

    public function login(Request $request){
        if ($request->method() == 'GET') {
            // Check loggedin
            if (!Auth::check()) {
                return view('pages.auth.login');
            }

            // Check admin
            if ($request->user()->role == 0) {
                return redirect(route('estimation.index'));
            } else {
                return redirect(route('admin.estimation.management'));
            }
        }

        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:5'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                return redirect()->route("admin.home");
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect()->route("auth.login");
            }
        }
    }

    public function logout(){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route("auth.login");
    }
}
