<?php
namespace App\Repositories;

use App\Models\BackendRolePermissions;

class BackendRolePermissionsRepository extends BaseRepository
{
    public function model()
    {
        return BackendRolePermissions::class;
    }

    /**
     * new recored
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function inject($params = '')
    {
        return $this->model->insert($params);
    }

    /**
     * get menus by role
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPermissionByRoles($rid = 0)
    {
        $res = [];
        $tmp = $this->model->select('permission_id')->whereIn('role_id', $rid)->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            foreach ($__ as $value) {
                if (!in_array($value['permission_id'], $res)) {
                    $res[] = $value['permission_id'];
                }
            }
        }
        return $res;
    }

    /**
     * delete
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function deleteByParams($params = '')
    {
        return $this->model->where($params)->delete();
    }

    /**
     * get permission by role
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPermissionByRole($id = 0)
    {
        $res = [];
        $tmp = $this->model->select('permission_id')->where('role_id', $id)->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            foreach ($__ as $value) {
                $res[] = $value['permission_id'];
            }
        }
        return $res;
    }
}
