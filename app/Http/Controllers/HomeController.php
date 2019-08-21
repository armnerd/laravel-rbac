<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BackendMenuRepository as BackendMenu;
use App\Repositories\BackendUsersRepository as BackendUsers;
use App\Repositories\BackendRolesRepository as BackendRoles;
use App\Repositories\BackendRoleMenuRepository as BackendRoleMenu;
use App\Repositories\BackendRoleUsersRepository as BackendRoleUsers;
use App\Repositories\BackendPermissionsRepository as BackendPermissions;
use App\Repositories\BackendRolePermissionsRepository as BackendRolePermissions;
use App\Component\ToolsComponent;
use App\Services\HomeService;

class HomeController extends Controller
{
    protected $request;
    protected $homeService;

    public function __construct(Request $request, HomeService $homeService)
    {
        parent::__construct();
        $this->request = $request;
        $this->homeService = $homeService;
    }

    /**
     * backend home page
     * @return view
     */
    public function index()
    {
        $data = $this->homeService->index();

        return view('home', $data);
    }

    /**
     * login page
     * @return view
     */
    public function login()
    {
        return view('login');
    }

    /**
     * login api
     * @return view
     */
    public function dologin(Request $request)
    {
        $phone = $request->input('phone', '');
        $pass  = $request->input('password', '');
        if (!$phone || !$pass) {
            $request->session()->flash('error', '请输入账号和密码！');
            return redirect('/login');
        }
        $params = [
            'phone'    => $phone,
            'password' => md5($pass),
        ];
        $model = new BackendUsers;
        $user  = $model->findUserByParams($params);
        if (empty($user)) {
            $request->session()->flash('error', '用户不存在或密码错误！');
            return redirect('/login');
        }
        //add session
        $roleUser = new BackendRoleUsers;
        $roles = $roleUser->getRolesByUser($user['id']);
        $rolePermission = new BackendRolePermissions;
        $permission = $rolePermission->getPermissionByRoles($roles);
        $permissionModel = new BackendPermissions;
        $auth = $permissionModel->getPermissionByIds($permission);
        session(['user' => $user]);
        session(['role' => $roles]);
        session(['auth' => $auth]);
        return redirect('/');
    }

    /**
     * logout
     * @return view
     */
    public function logout()
    {
        $this->request->session()->flush();

        return redirect('login');
    }
}
