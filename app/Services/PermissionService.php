<?php
namespace App\Services;

use App\Repositories\BackendPermissionsRepository;
use App\Repositories\BackendMenuRepository;
use App\Repositories\BackendRolePermissionsRepository;

class PermissionService
{
    protected $backendPermissionsRepository;
    protected $backendMenuRepository;
    protected $backendRolePermissionsRepository;
    
    public function __construct(BackendPermissionsRepository $backendPermissionsRepository, BackendMenuRepository $backendMenuRepository, BackendRolePermissionsRepository $backendRolePermissionsRepository)
    {
        $this->backendPermissionsRepository = $backendPermissionsRepository;
        $this->backendMenuRepository = $backendMenuRepository;
        $this->backendRolePermissionsRepository = $backendRolePermissionsRepository;
    }

    /**
     * permission list
     * @return array
     */
    public function list($per_page)
    {
        $list  = $this->backendPermissionsRepository->getAllPermissions($per_page);
        $menus = $this->backendMenuRepository->getTopMenu();
        $pages = getPages($list, '/permission/list');
        $data = [
          'main' => '权限',
          'sub'  => '管理',
          'list'  => $list,
          'pages' => $pages,
          'menus' => $menus,
        ];

        return $data;
    }

    /**
     * add new permission
     */
    public function save($params)
    {
        $this->backendPermissionsRepository->saveNewPermission($params);
    }

    /**
     * delete permission
     */
    public function delete($id)
    {
        //delete permission
        $this->backendPermissionsRepository->deleteItems([$id]);
        //delete binding between permission and role
        $this->backendRolePermissionsRepository->deleteByParams(['permission_id' => $id]);
    }

    /**
     * get one permission
     * @return array
     */
    public function info($id)
    {
        $data = $this->backendPermissionsRepository->getOneInfo($id);

        return $data;
    }

    /**
     * change permission
     */
    public function change($id, $params)
    {
        $this->backendPermissionsRepository->updateInfo($id, $params);
    }
}
