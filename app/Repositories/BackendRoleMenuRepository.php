<?php
namespace App\Repositories;

use App\Models\BackendRoleMenu;

class BackendRoleMenuRepository extends BaseRepository
{
    public function model()
    {
        return BackendRoleMenu::class;
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
     * delete
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function deleteByParams($params = '')
    {
        return $this->model->where($params)->delete();
    }

    /**
     * get roles by menu
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getRoleByMenu($id = 0)
    {
        $res = [];
        $tmp = $this->model->select('role_id')->where('menu_id', $id)->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            foreach ($__ as $value) {
                $res[] = $value['role_id'];
            }
        }
        return $res;
    }

    /**
     * multi delete
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function multiDeleteByParams($filed = '', $values = '')
    {
        return $this->model->whereIn($filed, $values)->delete();
    }
}
