<?php
namespace App\Repositories;

use App\Models\BackendRoles;

class BackendRolesRepository extends BaseRepository
{
    public function model()
    {
        return BackendRoles::class;
    }

    /**
     * new recored
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function inject($params = '')
    {
        return $this->model->insertGetId($params);
    }

    /**
     * get all roles
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getRolesList()
    {
        $roles = [];
        $tmp = $this->model->select('*')->orderBy('id', 'asc')->get();
        if (!empty($tmp)) {
            $roles = $tmp->toArray();
        }
        return $roles;
    }

    /**
     * get all roles
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllRoles($per_page = 10)
    {
        $roles = [];
        $tmp = $this->model->select('*')->orderBy('id', 'asc')->paginate($per_page);
        if (!empty($tmp)) {
            $roles = $tmp->toArray();
        }
        return $roles;
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
    public function updateInfo($params = '', $id = 0)
    {
        return $this->model->where('id', $id)->update($params);
    }
}
