<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use Validator;
use Auth;
use App\Repositories\UserRepository;
use App\Repositories\UserCartRepository;
use App\Repositories\EmployeeRepository;
use Hash;
use Cart;

/** LoginController
 * @property CategoryRepository
 * @property UserRepository
 * @property UserCartRepository
 * @property EmployeeRepository
 */

class LoginController extends Controller
{
    /** LoginController construct
     * @property CategoryRepository $categoryRepository
     * @property UserRepository $userRepository
     * @property UserCartRepository $userCartRepository
     * @property EmployeeRepository $employeeRepository
     */
    protected $categoryRepository;
    protected $userRepository;
    protected $userCartRepository;
    protected $employeeRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        UserRepository $userRepository,
        UserCartRepository $userCartRepository,
        EmployeeRepository $employeeRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
        $this->userCartRepository = $userCartRepository;
        $this->employeeRepository = $employeeRepository;
    }

    /**  function getLogin
     * @return $category
     */
    public function getLogin()
    {
        $category = $this->categoryRepository->getListCategory()->get();

        return view('fontend.pages.auth.login', compact('category'));
    }

    /** function login
     * @property Request $request
     * @return redirect
     */
    public function login(Request $request)
    {
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
                        $this->userCartRepository->create($value, $user_id);
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
        $category = $this->categoryRepository->getListCategory()->get();

        return view('fontend.pages.auth.register', compact('category'));
    }

    /** function register
     *  @property Request $request
     * @return redirect
     */
    public function register(Request $request)
    {
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
            return redirect('register')->withErrors($validator);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            
            if($this->userRepository->checkUser($email)) {
                return redirect()->route("register")->with('error', 'Email đã tòn tại !');
            } else {
                $password = Hash::make($password);
                $data = [
                    'email' => $email,
                    'password' => $password,
                    'role_id' => 1,
                    'name' =>'Employee'
                ];
                $this->userRepository->create($data);
                $this->employeeRepository->create($email);

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
