<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    protected $request;
    protected $permissionService;

    public function __construct(Request $request, PermissionService $permissionService)
    {
        parent::__construct();
        $this->request = $request;
        $this->permissionService = $permissionService;
    }

    /**
     * permission list
     * @return view
     */
    public function list()
    {
        $per_page = $this->request->input('per_page', 10);

        $data = $this->permissionService->list($per_page);
        
        return view('admin.permission_list', $data);
    }

    /**
     * add new permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function save()
    {
        $params = [
          'name' => $this->request->input('name'),
          'menu' => $this->request->input('menu'),
          'http_path' => $this->request->input('http_path'),
        ];

        $this->permissionService->save($params);

        return $this->success([]);
    }

    /**
     * delete permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete()
    {
        $this->permissionService->delete($this->request->input('id'));

        return $this->success([]);
    }

    /**
     * get one permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function info()
    {
        $data = $this->permissionService->info($this->request->input('id'));

        return $this->success(['info' => $data]);
    }

    /**
     * change permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function change()
    {
        $params = [
          'name' => $this->request->input('name'),
          'http_path' => $this->request->input('http_path'),
        ];

        $this->permissionService->change($this->request->input('id'), $params);

        return $this->success([]);
    }
}
