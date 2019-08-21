<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    protected $request;
    protected $userService;

    public function __construct(Request $request, UserService $userService)
    {
        parent::__construct();
        $this->request = $request;
        $this->userService = $userService;
    }

    /**
     * user list
     * @return view
     */
    public function list()
    {
        $per_page = $this->request->input('per_page', 10);

        $data = $this->userService->list($per_page);
        
        return view('admin.user_list', $data);
    }

    /**
     * add new user
     * @return view
     */
    public function add()
    {
        $data = $this->userService->add();
        
        return view('admin.user_add', $data);
    }

    /**
     * add new user
     * @return \Illuminate\Http\JsonResponse
     */
    public function save()
    {
        $params = [
            'name' => $this->request->input('name'),
            'phone' => $this->request->input('phone'),
            'email' => $this->request->input('email'),
            'avatar' => $this->request->input('avatar'),
            'password' => md5($this->request->input('password')),
        ];

        $this->userService->save($params, $this->request->input('roles'));

        return $this->success([]);
    }

    /**
     * upload img
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload()
    {
        $data = $this->userService->upload($_POST['image_url']);
        
        return $this->success($data);
    }

    /**
     * delete role
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete()
    {
        $id = $this->request->input('id');
        if ($id == 1) {
            return $this->failed('该用户不能被删除');
        }
        
        $this->userService->delete($id);

        return $this->success([]);
    }

    /**
     * edit role
     * @return view
     */
    public function edit()
    {
        $data = $this->userService->edit($this->request->input('id'));
        
        return view('admin.user_edit', $data);
    }

    /**
     * change user
     * @return \Illuminate\Http\JsonResponse
     */
    public function change()
    {
        $id = $this->request->input('id');
        $password = $this->request->input('password', '');
        $params   = [
            'name'   => $this->request->input('name'),
            'phone'  => $this->request->input('phone'),
            'email'  => $this->request->input('email'),
            'avatar' => $this->request->input('avatar'),
        ];
        if ($password) {
            $params['password'] = md5($password);
        }
        $roles = $this->request->input('roles');
        
        $this->userService->change($id, $params, $roles);

        return $this->success([]);
    }
}
