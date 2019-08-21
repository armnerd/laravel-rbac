<?php
namespace App\Services;

use App\Repositories\BackendRolesRepository;
use App\Repositories\BackendMenuRepository;
use App\Repositories\BackendRolePermissionsRepository;
use App\Repositories\BackendRoleMenuRepository;
use App\Repositories\BackendPermissionsRepository;
use App\Repositories\BackendRoleUsersRepository;

class RoleService
{
    protected $backendRolesRepository;
    protected $backendMenuRepository;
    protected $backendRolePermissionsRepository;
    protected $backendRoleMenuRepository;
    protected $backendPermissionsRepository;
    protected $backendRoleUsersRepository;
    
    public function __construct(BackendRolesRepository $backendRolesRepository, BackendMenuRepository $backendMenuRepository, BackendRolePermissionsRepository $backendRolePermissionsRepository, BackendRoleMenuRepository $backendRoleMenuRepository, BackendPermissionsRepository $backendPermissionsRepository, BackendRoleUsersRepository $backendRoleUsersRepository)
    {
        $this->backendRolesRepository = $backendRolesRepository;
        $this->backendMenuRepository = $backendMenuRepository;
        $this->backendRolePermissionsRepository = $backendRolePermissionsRepository;
        $this->backendRoleMenuRepository = $backendRoleMenuRepository;
        $this->backendPermissionsRepository = $backendPermissionsRepository;
        $this->backendRoleUsersRepository = $backendRoleUsersRepository;
    }

    /**
     * role list
     * @return array
     */
    public function list($per_page)
    {
        $list = $this->backendRolesRepository->getAllRoles($per_page);
        $auth = $this->backendPermissionsRepository->getPermissionsList();
        $menus = $this->backendMenuRepository->getTopMenu();
        $pages = getPages($list, '/role/list');
        $data  = [
            'main'  => '角色',
            'sub'   => '管理',
            'list'  => $list,
            'auth'  => $auth,
            'pages' => $pages,
            'menus' => $menus,
        ];

        return $data;
    }

    /**
     * add new role
     * @return bool
     */
    public function save($params, $auth)
    {
        $role_id = $this->backendRolesRepository->inject($params);
        if (!empty($auth)) {
            $topMenus = $this->backendPermissionsRepository->getMenuByPermissions($auth);
            $childMenus = $this->backendMenuRepository->getChildMenuByRoots($topMenus);
            $menus = array_merge($topMenus, $childMenus);
            //bind role's permission
            foreach ($auth as $key => $value) {
                $__ = [
                'role_id' => $role_id,
                'permission_id' => $value,
                ];
                $this->backendRolePermissionsRepository->inject($__);
            }
            //bing role's menu
            foreach ($menus as $k => $v) {
                $__ = [
                'role_id' => $role_id,
                'menu_id' => $v,
                ];
                $this->backendRoleMenuRepository->inject($__);
            }
        }

        return true;
    }

    /**
     * delete permission
     */
    public function delete($id)
    {
        //delete role
        $this->backendRolesRepository->deleteItems([$id]);
        //delete binding between permission and role
        $this->backendRolePermissionsRepository->deleteByParams(['role_id' => $id]);
        //delete binding between user and role
        $this->backendRoleUsersRepository->deleteByParams(['role_id' => $id]);
        //delete binding between menu and role
        $this->backendRoleMenuRepository->deleteByParams(['role_id' => $id]);
    }

    /**
     * get one role
     * @return array
     */
    public function info($id)
    {
        $data = [
            'info' => $this->backendRolesRepository->getOneInfo($id),
            'auth' => $this->backendRolePermissionsRepository->getPermissionByRole($id),
        ];

        return $data;
    }

    /**
     * change permission
     * @return bool
     */
    public function change($id, $params, $auth)
    {
        //update role info
        $this->backendRolesRepository->updateInfo($params, $id);
        //delete relationship between role and permission
        $this->backendRolePermissionsRepository->deleteByParams(['role_id'=>$id]);
        //delete relationship between role and menu
        $this->backendRoleMenuRepository->deleteByParams(['role_id'=>$id]);
        //add new binding
        if (!empty($auth)) {
            $topMenus = $this->backendPermissionsRepository->getMenuByPermissions($auth);
            $childMenus = $this->backendMenuRepository->getChildMenuByRoots($topMenus);
            $menus = array_merge($topMenus, $childMenus);
            foreach ($auth as $key => $value) {
                //bing role's permission
                $__ = [
                'role_id' => $id,
                'permission_id' => $value,
                ];
                $this->backendRolePermissionsRepository->inject($__);
            }
            //bing role's menu
            foreach ($menus as $k => $v) {
                $__ = [
                'role_id' => $id,
                'menu_id' => $v,
                ];
                $this->backendRoleMenuRepository->inject($__);
            }
        }

        return true;
    }
}
