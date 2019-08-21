<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class BackendMenu extends BaseModel
{
    protected $table = 'backend_menu';

    /**
     * get all menus by ids
     * @author fanzhen
     */
    public function getMenuByIds($ids)
    {
        $menus = [];
        $tmp = self::select('*')->whereIn('id', $ids)->orderBy('id', 'asc')->get();
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
     * get root menu
     * @author fanzhen
     */
    public function getMenuOrigin($url)
    {
        $root = 0;
        $tmp  = self::select('belong')->where(['url' => $url])->first();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            $root = $__['belong'];
        }
        return $root;
    }
}
