<?php
namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    // 给角色赋予权限
    public function grantPermission($permission)
    {
        return $this->perms()->save($permission);
    }

    // 取消角色赋予的权限
    public function deletePermission($permisssion)
    {
        return $this->perms()->detach($permisssion);
    }

}