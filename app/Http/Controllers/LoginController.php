<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use Validator;
use Auth;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Contracts\UserCartInterface;
use App\Repositories\Contracts\EmployeeInterface;
use Hash;
use Cart;

/** LoginController
 * @property CategoryInterface
 * @property UserInterface
 * @property UserCartInterface
 * @property EmployeeInterface
 */

class LoginController extends Controller
{
    /** LoginController construct
     * @property CategoryInterface $categoryInterface
     * @property UserInterface $userInterface
     * @property UserCartInterface $userCartInterface
     * @property EmployeeInterface $employeeInterface
     */
    protected $categoryInterface;
    protected $userInterface;
    protected $userCartInterface;
    protected $employeeInterface;

    public function __construct(
        CategoryInterface $categoryInterface,
        UserInterface $userInterface,
        UserCartInterface $userCartInterface,
        EmployeeInterface $employeeInterface
    )
    {
        $this->categoryInterface = $categoryInterface;
        $this->userInterface = $userInterface;
        $this->userCartInterface = $userCartInterface;
        $this->employeeInterface = $employeeInterface;
    }

    /**  function getLogin
     * @return $category
     */
    public function getLogin()
    {
        $category = $this->categoryInterface->getListCategory()->get();

        return view('fontend.pages.auth.login', compact('category'));
    }

    /** function login
     * @property Request $request
     * @return redirect
     */
    public function login(Request $request)
    {
        $rules = [
            'email' =>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:5:max:20'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.regex' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự',
            'password.max' => 'Mật khẩu không nhiều hơn 20 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            $role = 1;

            if( Auth::attempt(['email' => $email, 'password' =>$password, 'role_id' => $role ])) {
                $user_id = Auth::user()->id;
                $cart = Cart::content();
                if(count($cart) > 0){
                    foreach($cart as $value){
                        $this->userCartInterface->create($value, $user_id);
                        Cart::remove($value->rowId);
                    }                
                }
                return redirect()->route("home");
            } else {
                return redirect()->route("login")->with('errorlogin', 'Email hoặc mật khẩu không đúng!');
            }
        }
    }

    /** function getregister
     * @return $category
     */
    public function getregister()
    {
        $category = $this->categoryInterface->getListCategory()->get();

        return view('fontend.pages.auth.register', compact('category'));
    }

    /** function register
     *  @property Request $request
     * @return redirect
     */
    public function register(Request $request)
    {
        $rules = [
            'email' =>'required|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:5|max:20'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.max' => 'Email không vượt quá 255 ký tự',
            'email.regex' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự',
            'password.max' => 'Mật khẩu không nhiều hơn 20 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect('register')->withErrors($validator);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            
            if($this->userInterface->checkUser($email)) {
                return redirect()->route("register")->with('error', 'Email đã tồn tại !');
            } else {
                $password = Hash::make($password);
                $data = [
                    'email' => $email,
                    'password' => $password,
                    'role_id' => 1,
                    'name' =>'Employee'
                ];
                $this->userInterface->create($data);
                $this->employeeInterface->create($email);

                return redirect()->route("login")->with('success', 'đăng ký thành công !');
            }
        }
    }

    /** function logout
     * @property Request $request
     * @return redirect
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route("home");
    }
}
