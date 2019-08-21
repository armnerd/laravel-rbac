<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $request;
    protected $roleService;

    public function __construct(Request $request, RoleService $roleService)
    {
        parent::__construct();
        $this->request = $request;
        $this->roleService = $roleService;
    }

    /**
     * role list
     * @return view
     */
    public function list()
    {
        $per_page = $this->request->input('per_page', 10);

        $data = $this->roleService->list($per_page);

        return view('admin.role_list', $data);
    }

    /**
     * add new role
     * @return \Illuminate\Http\JsonResponse
     */
    public function save()
    {
        $params = ['name' => $this->request->input('name')];
        $auth = $this->request->input('permission');

        $this->roleService->save($params, $auth);

        return $this->success([]);
    }

    /**
     * delete permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete()
    {
        $this->roleService->delete($this->request->input('id'));

        return $this->success([]);
    }

    /**
     * get one role
     * @return \Illuminate\Http\JsonResponse
     */
    public function info()
    {
        $data = $this->roleService->info($this->request->input('id'));
        
        return $this->success($data);
    }

    /**
     * change permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function change()
    {
        $params = ['name' => $this->request->input('name')];

        $this->roleService->change($this->request->input('id'), $params, $this->request->input('permission'));

        return $this->success([]);
    }
}
