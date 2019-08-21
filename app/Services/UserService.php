<?php
namespace App\Services;

use App\Repositories\BackendUsersRepository;
use App\Repositories\BackendRoleUsersRepository;
use App\Repositories\BackendRolesRepository;
use App\Component\ToolsComponent;

class UserService
{
    protected $backendUsersRepository;
    protected $backendRoleUsersRepository;
    protected $backendRolesRepository;
    
    public function __construct(BackendUsersRepository $backendUsersRepository, BackendRoleUsersRepository $backendRoleUsersRepository, BackendRolesRepository $backendRolesRepository)
    {
        $this->backendUsersRepository = $backendUsersRepository;
        $this->backendRoleUsersRepository = $backendRoleUsersRepository;
        $this->backendRolesRepository = $backendRolesRepository;
    }

    /**
     * user list
     * @return array
     */
    public function list($per_page)
    {
        $list  = $this->backendUsersRepository->getAllUsers($per_page);
        $uids = [];
        foreach ($list['data'] as $value) {
            $uids[] = $value['id'];
        }
        $roles = $this->backendRoleUsersRepository->getRolesForUsers($uids);
        foreach ($list['data'] as $key => $value) {
            if (isset($roles[$value['id']])) {
                $list['data'][$key]['roles'] = $roles[$value['id']];
            } else {
                $list['data'][$key]['roles'] = [];
            }
        }
        $pages = getPages($list, '/user/list');
        $data  = [
            'main'  => '用户',
            'sub'   => '列表',
            'list'  => $list,
            'pages' => $pages,
        ];

        return $data;
    }

    /**
     * add new user
     * @return array
     */
    public function add()
    {
        $roles  = $this->backendRolesRepository->getRolesList();
        $data   = [
            'main'   => '用户',
            'sub'    => '增加',
            'roles'  => $roles,
        ];

        return $data;
    }

    /**
     * add new user
     * @return  bool
     */
    public function save($params, $roles)
    {
        $user_id = $this->backendUsersRepository->inject($params);
        if (!empty($roles)) {
            foreach ($roles as $key => $value) {
                $__ = [
                'user_id' => $user_id,
                'role_id' => $value,
                ];
                $this->backendRoleUsersRepository->inject($__);
            }
        }

        return true;
    }

    /**
     * upload img
     * @return array
     */
    public function upload($image_url = '')
    {
        //get file name
        $__   = explode(';', $image_url);
        $tmp  = explode('/', $__[0]);
        $type = $tmp['1'];
        $uuid = ToolsComponent::uuid();
        $file = $uuid.'.'.$type;
        $path = __DIR__."/../../public/avatar/".$file;
        //storage image
        preg_match('/^(data:\s*image\/(\w+);base64,)/', $image_url, $result);
        $data = base64_decode(str_replace($result[1], '', $image_url));
        file_put_contents($path, $data);

        return ['url' => '/avatar/' . $file];
    }

    /**
     * delete role
     */
    public function delete($id)
    {
        //delete the user
        $this->backendUsersRepository->deleteItems([$id]);
        //delete binding between user and role
        $this->backendRoleUsersRepository->deleteByParams(['user_id'=>$id]);
    }

    /**
     * edit role
     * @return array
     */
    public function edit($id)
    {
        $roles = $this->backendRolesRepository->getRolesList();
        $data  = [
            'main'  => '用户',
            'sub'   => '编辑',
            'roles' => $roles,
            'info'  => $this->backendUsersRepository->getOneInfo($id),
            'role'  => $this->backendRoleUsersRepository->getRoleByUser($id),
        ];

        return $data;
    }

    /**
     * change user
     * @return  true
     */
    public function change($id, $params, $roles)
    {
        //uodate user's info
        $this->backendUsersRepository->updateInfo($params, $id);
        if ($roles) {
            //delete binding between user and role
            $this->backendRoleUsersRepository->deleteByParams(['user_id' => $id]);
            //add new relationship
            if (!empty($roles)) {
                foreach ($roles as $key => $value) {
                    $__ = [
                    'user_id' => $id,
                    'role_id' => $value,
                    ];
                    $this->backendRoleUsersRepository->inject($__);
                }
            }
        }

        return true;
    }
}
