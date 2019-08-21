<?php
namespace App\Repositories;

use App\Models\BackendUsers;

class BackendUsersRepository extends BaseRepository
{
    public function model()
    {
        return BackendUsers::class;
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
     * 获取所有数据的id与name
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return $this->model->all(['id', 'name']);
    }

    /**
     * get user by params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findUserByParams($params = '')
    {
        $one = [];
        $tmp = $this->model->select('*')->where($params)->first();
        if (!empty($tmp)) {
            $one = $tmp->toArray();
        }
        return $one;
    }

    /**
     * get user by openid
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getUserIdByOpenid($openid = '')
    {
        $one = [];
        $tmp = $this->model->select('id')->where(['openid' => $openid])->first();
        if (!empty($tmp)) {
            $one = $tmp->toArray();
        }
        return $one;
    }

    /**
     * bing user openid
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function bindUserOpenid($uid = 0, $openid = '')
    {
        return $this->model->where('id', $uid)->update(['openid' => $openid]);
    }

    /**
     * get all users
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllUsers($per_page = 10)
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
     * get one user
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
