<?php
namespace App\Services;

use App\Repositories\BackendMenuRepository;
use App\Repositories\BackendRolesRepository;
use App\Repositories\BackendRoleMenuRepository;

class MenuService
{
    protected $backendMenuRepository;
    protected $backendRolesRepository;
    protected $backendRoleMenuRepository;

    public function __construct(BackendMenuRepository $backendMenuRepository, BackendRolesRepository $backendRolesRepository, BackendRoleMenuRepository $backendRoleMenuRepository)
    {
        $this->backendMenuRepository = $backendMenuRepository;
        $this->backendRolesRepository = $backendRolesRepository;
        $this->backendRoleMenuRepository = $backendRoleMenuRepository;
    }

    /**
     * menu list
     * @return array
     */
    public function list()
    {
        $list = $this->backendMenuRepository->getAll();
        $data = [
            'main' => '菜单',
            'sub'  => '列表',
            'list' => $list,
        ];

        return $data;
    }

    /**
     * add new menu
     * @return array
     */
    public function add()
    {
        $menus = $this->backendMenuRepository->getTopMenu();
        $roles = $this->backendRolesRepository->getRolesList();
        unset($roles[0]);   //去除管理员选项
        $data  = [
            'main'   => '菜单',
            'sub'    => '增加',
            'menus'  => $menus,
            'roles'  => $roles,
        ];

        return $data;
    }

    /**
     * add new menu
     * @return  bool
     */
    public function save($params, $roles)
    {
        $menu_id = $this->backendMenuRepository->inject($params);
        if (!empty($roles)) {
            $menus[] = $menu_id;
            if ($params['belong'] != 0) {
                $menus[] = $params['belong'];
            }
            foreach ($roles as $key => $value) {
                foreach ($menus as $k => $v) {
                    $__ = [
                    'menu_id' => $v,
                    'role_id' => $value,
                    ];
                    $this->backendRoleMenuRepository->deleteByParams($__);
                    $this->backendRoleMenuRepository->inject($__);
                }
            }
        }

        return true;
    }

    /**
     * delete permission
     */
    public function delete($id)
    {
        $res = $this->backendMenuRepository->isRootMenu($id);
        if (!empty($res)) {
            foreach ($res as $key => $value) {
                //delete sub menu
                $this->backendMenuRepository->deleteItems([$value]);
                //delete binding between sub menu and role
                $this->backendRoleMenuRepository->deleteByParams(['menu_id'=>$value]);
            }
        }
        //delete menu
        $this->backendMenuRepository->deleteItems([$id]);
        //delete binding between menu and role
        $this->backendRoleMenuRepository->deleteByParams(['menu_id'=>$id]);
    }

    /**
     * edit menu
     * @return array
     */
    public function edit($id)
    {
        $__  = $this->backendMenuRepository->getTopMenu();
        $menus = [];
        foreach ($__ as $key => $value) {
            $menus[$value['id']] = $value;
        }
        $roles  = $this->backendRolesRepository->getRolesList();
        unset($roles[0]);   //去除管理员选项
        $data   = [
            'main'   => '菜单',
            'sub'    => '编辑',
            'menus'  => $menus,
            'roles'  => $roles,
            'info'   => $this->backendMenuRepository->getOneInfo($id),
            'role'   => $this->backendRoleMenuRepository->getRoleByMenu($id),
        ];

        return $data;
    }

    /**
     * change menu
     * @return bool
     */
    public function change($id, $params, $roles)
    {
        //uodate menu's info
        $this->backendMenuRepository->updateInfo($params, $id);
        //delete binding between menu and role
        $menus[] = $id;
        if ($params['belong'] == 0) {
            $__ = $this->backendMenuRepository->getChildMenuByRoots([$id]);

            $menus = array_merge($menus, $__);
        }
        $this->backendRoleMenuRepository->multiDeleteByParams('menu_id', $menus);
        //add new relationship
        if (!empty($roles)) {
            if ($params['belong'] != 0) {
                $menus[] = $params['belong'];
            }
            foreach ($roles as $key => $value) {
                foreach ($menus as $k => $v) {
                    $__ = [
                    'menu_id' => $v,
                    'role_id' => $value,
                    ];
                    $this->backendRoleMenuRepository->deleteByParams($__);
                    $this->backendRoleMenuRepository->inject($__);
                }
            }
        }

        return true;
    }
}
