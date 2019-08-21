<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class BackendRoleMenu extends BaseModel
{
    protected $table = 'backend_role_menu';

    /**
     * get menus by role
     * @author fanzhen
     */
    public function getMenusByRoles($rid)
    {
        $res = [];
        $tmp = self::select('menu_id')->whereIn('role_id', $rid)->get();
        if (!empty($tmp)) {
            $__ = $tmp->toArray();
            foreach ($__ as $value) {
                if (!in_array($value['menu_id'], $res)) {
                    $res[] = $value['menu_id'];
                }
            }
        }
        return $res;
    }
}
