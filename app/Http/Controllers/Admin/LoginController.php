<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserInterface;
use App\Notifications\ResetPassword;
use App\Models\PasswordReset;
use Auth;
use Validator;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
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
            return redirect('auth/login')->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {

                if($request->user()->role_id == 3){

                    return redirect(route('admin.home'));
                }else if($request->user()->role_id == 2){
        
                    return redirect(route('customer.home'));
                }else if($request->user()->role_id == 4){
        
                    return redirect(route('shiper.home'));
                }
            } else {
                return redirect()->route("auth.login")->with('error', 'Email hoặc mật khẩu không đúng!');
            }
        }
    }

    public function confirm(){
        return view('admin.pages.auths.confirm');
    }

    public function sendMail(Request $request){

        if ($request->method() == 'GET') {
            return view('admin.pages.auths.confirm');
        }
        
        $user = $this->userInterface->checkUser($request->email);
        if (!$user) {
            $errors = new MessageBag(['errorlogin' => "Account does not exist, please check again !"]);
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $passwordReset = PasswordReset::updateOrCreate(['email' => $user->email], ['token' => Str::random(30)]);
        if ($passwordReset) {
            $user->notify(new ResetPassword($passwordReset->token, $user->email));
        }
        return redirect(route('auth.confirm'))->with('message', "please check your email");
    }

    public function resetPassword(Request $request, $token = null)
    {
        if ($request->method() == 'GET') {
            return view('admin.pages.auths.resetpassword', compact('token'));
        }

        $password = $request->input('password');
        
        $token = $request->input('token');
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return redirect()->back()->withErrors('error', 'Token has expired, please check again!');
        }

        $this->userInterface->resetPassword($passwordReset['email'], Hash::make($password));
        $passwordReset->delete();
        return redirect(route('auth.login'))->with('reset-success', 'password changed successfully!');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route("auth.login");
    }
}
