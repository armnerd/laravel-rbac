<?php
namespace App\Repositories;

use App\Models\BackendPermissions;

class BackendPermissionsRepository extends BaseRepository
{
    public function model()
    {
        return BackendPermissions::class;
    }

    /**
     * get permission by ids
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPermissionByIds($id = 0)
    {
        $res = [];
        $tmp = $this->model->select('http_path')->whereIn('id', $id)->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            foreach ($__ as $value) {
                $urls = explode(';', $value['http_path']);
                foreach ($urls as $val) {
                    if ($val != '' && !in_array($val, $res)) {
                        $res[] = $val;
                    }
                }
            }
        }
        return $res;
    }

    /**
     * get all permissions
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllPermissions($per_page = 10)
    {
        $roles = [];
        $tmp = $this->model->select('*')->orderBy('id', 'asc')->paginate($per_page);
        if (!empty($tmp)) {
            $roles = $tmp->toArray();
        }
        return $roles;
    }

    /**
     * save new permission
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function saveNewPermission($params = '')
    {
        return $this->model->insert($params);
    }

    /**
     * delete
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function deleteItems($ids = '')
    {
        return $this->model->whereIn('id', $ids)->delete();
    }

    /**
     * get one permission
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getOneInfo($id = 0)
    {
        $res = [];
        $raw = $this->model->select('*')->where('id', $id)->first();
        if (!empty($raw)) {
            $res = $raw->toArray();
        }
        return $res;
    }

    /**
     * update
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function updateInfo($id = 0, $params = '')
    {
        return $this->model->where('id', $id)->update($params);
    }

    /**
     * get all permissions
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPermissionsList()
    {
        $roles = [];
        $tmp = $this->model->select('*')->where('menu', '!=', '999999999')->orderBy('id', 'asc')->get();
        if (!empty($tmp)) {
            $roles = $tmp->toArray();
        }
        return $roles;
    }

    /**
     * get permission's bind top menu
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getMenuByPermissions($auth = '')
    {
        $res = [];
        $tmp = $this->model->select('menu')->whereIn('id', $auth)->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            foreach ($__ as $value) {
                if ($value['menu'] != 0 && !in_array($value['menu'], $res)) {
                    $res[] = $value['menu'];
                }
            }
        }
        return $res;
    }
}
