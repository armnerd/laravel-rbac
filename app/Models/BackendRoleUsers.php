<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class BackendRoleUsers extends BaseModel
{
    protected $table = 'backend_role_users';

    /**
     * bind role info
     * @author fanzhen
     */
    public function backendRoles()
    {
        return $this->hasOne(BackendRoles::class, 'id', 'role_id');
    }
}
