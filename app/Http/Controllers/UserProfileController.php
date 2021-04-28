<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Contracts\EmployeeInterface;
use App\Repositories\Contracts\OrderInterface;
use App\Repositories\Contracts\AddressInterface;
use App\Repositories\Contracts\CategoryInterface;
use Auth;

/** 
 * UserProfileController
 * 
 *  @property UserInterface
 *  @property EmployeeInterface
 *  @property OrderInterface
 *  @property AddressInterface
 *  @property CategoryInterface
 */
class UserProfileController extends Controller
{
 
    /** 
     * UserProfileController __construct
     * 
     * @property UserInterface $userInterface
     * @property EmployeeInterface $employeeInterface,
     * @property OrderInterface $orderInterface
     * @property CategoryInterface $categoryInterface
     */
    protected $userInterface;
    protected $orderInterface;
    protected $employeeInterface;
    protected $categoryInterface;
    
    public function __construct(
        OrderInterface $orderInterface,
        EmployeeInterface $employeeInterface,
        UserInterface $userInterface,
        CategoryInterface $categoryInterface
    )
    {
        $this->orderInterface = $orderInterface;
        $this->employeeInterface = $employeeInterface;
        $this->userInterface = $userInterface;
        $this->categoryInterface = $categoryInterface;
    }

    /** function index
     * @property Request $request
     * @return $category, $employee, $page, $orderDetail
     */
    public function index(Request $request)
    {
        $page = $request->page;
        $employee = $this->employeeInterface->getEmployee(Auth::user()->id);
        $category = $this->categoryInterface->getListCategory()->get();
        $orderDetail = $this->orderInterface->getOrderByUser(Auth::user()->id);

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

        $this->employeeInterface->update($request->all(), $file_name);

        return redirect()->back()->with('message', 'chỉnh sửa thành công');
    }
}
