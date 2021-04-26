<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\OrderRepository;
use App\Repositories\AddressRepository;
use App\Repositories\CategoryRepository;
use Auth;

/** UserProfileController
 *  @property UserRepository
 *  @property EmployeeRepository
 *  @property OrderRepository
 *  @property AddressRepository
 *  @property CategoryRepository
 */
class UserProfileController extends Controller
{
 
    /** UserProfileController __construct
     * @property OrderRepository $orderRepository
     * @property EmployeeRepository $employeeRepository,
     * @property UserRepository $userRepository
     * @property CategoryRepository $categoryRepository
     */
    protected $userRepository;
    protected $orderRepository;
    protected $employeeRepository;
    protected $categoryRepository;
    
    public function __construct(
        OrderRepository $orderRepository,
        EmployeeRepository $employeeRepository,
        UserRepository $userRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->employeeRepository = $employeeRepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /** function index
     * @property Request $request
     * @return $category, $employee, $page, $orderDetail
     */
    public function index(Request $request)
    {
        $page = $request->page;
        $employee = $this->employeeRepository->getEmployee(Auth::user()->id);
        $category = $this->categoryRepository->getListCategory()->get();
        $orderDetail = $this->orderRepository->getOrderByUser(Auth::user()->id);

        return view('fontend.pages.user.profile', compact('category', 'employee', 'page', 'orderDetail'));
    }

    /** function update
     * @property Request $request
     * @return redirect
     */
    public function update(Request $request)
    {
        $file_name = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move('assets/images', $file->getClientOriginalName());

        }

        $this->employeeRepository->update($request->all(), $file_name);

        return redirect()->back()->with('message', 'chỉnh sửa thành công');
    }
}
