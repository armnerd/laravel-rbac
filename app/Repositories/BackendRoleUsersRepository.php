<?php
namespace App\Repositories;

use App\Models\BackendRoleUsers;

class BackendRoleUsersRepository extends BaseRepository
{
    public function model()
    {
        return BackendRoleUsers::class;
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
     * get roles by user
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getRolesByUser($uid = 0)
    {
        $one = [];
        $tmp = $this->model->select('role_id')->where(['user_id' => $uid])->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            foreach ($__ as $value) {
                $one[] = $value['role_id'];
            }
        }
        return $one;
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
     * get role info by users
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getRolesForUsers($uids = '')
    {
        $res = [];
        $tmp = $this->model->select('user_id', 'role_id')->whereIn('user_id', $uids)
             ->with([
                'backendRoles' => function ($query) {
                    $query->select('id', 'name');
                }
             ])->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
        
            foreach ($__ as $value) {
                if (isset($res[$value['user_id']])) {
                    if (!in_array($value['backend_roles']['name'], $res[$value['user_id']])) {
                        $res[$value['user_id']][] = $value['backend_roles']['name'];
                    }
                } else {
                    $res[$value['user_id']][] = $value['backend_roles']['name'];
                }
            }
        }
        return $res;
    }

    /**
     * get roles by user
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getRoleByUser($id = 0)
    {
        $res = [];
        $tmp = $this->model->select('role_id')->where('user_id', $id)->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            foreach ($__ as $value) {
                $res[] = $value['role_id'];
            }
        }
        return $res;
    }
}
