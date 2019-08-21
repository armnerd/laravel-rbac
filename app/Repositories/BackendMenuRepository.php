<?php
namespace App\Repositories;

use App\Models\BackendMenu;

class BackendMenuRepository extends BaseRepository
{
    public function model()
    {
        return BackendMenu::class;
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
     * get all menus
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        $menus = [];
        $tmp = $this->model->select('*')->orderBy('id', 'asc')->get();
        if (!empty($tmp)) {
            $raw = $tmp->toArray();
            foreach ($raw as $key => $value) {
                if ($value['belong'] == 0) {
                    $menus[$value['id']] = $value;
                }
            }
            foreach ($raw as $key => $value) {
                if ($value['belong'] != 0) {
                    $menus[$value['belong']]['sub'][$value['id']] = $value;
                }
            }
        }
        return $menus;
    }

    /**
     * get all menus
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTopMenu()
    {
        $menus = [];
        $tmp = $this->model->select('*')->where(['belong' => 0])->orderBy('id', 'asc')->get();
        if (!empty($tmp)) {
            $menus = $tmp->toArray();
        }
        return $menus;
    }

    /**
     * is root menu
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function isRootMenu($id = 0)
    {
        $res = [];
        $raw = $this->model->select('id')->where('belong', $id)->get();
        if (!empty($raw)) {
            $__ = $raw->toArray();
            foreach ($__ as $key => $value) {
                $res[] = $value['id'];
            }
        }
        return $res;
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
     * get one menu
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

    /**
     * get all child menu by root
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getChildMenuByRoots($ids = '')
    {
        $menus = [];
        $tmp = $this->model->select('*')->whereIn('belong', $ids)->get();
        if (!empty($tmp)) {
            $raw = $tmp->toArray();
            foreach ($raw as $key => $value) {
                $menus[] = $value['id'];
            }
        }
        return $menus;
    }
}
