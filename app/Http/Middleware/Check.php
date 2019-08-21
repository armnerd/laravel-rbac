<?php

namespace App\Http\Middleware;

use Closure;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $me = session('user');
        $role = session('role');
        if (!$me) {
            return redirect('login');
        }
        $auth = session('auth');
        $current = '/' . $request->path();
        $admin = [
            '/user/list', '/user/add',
            '/menu/list', '/menu/add', '/menu/edit',
            '/role/list', '/permission/list', '/oprate/logs',
            '/api/menu/save', '/api/menu/change', '/api/menu/delete',
            '/api/permission/save', '/api/permission/change', '/api/permission/delete',
            '/api/role/save', '/api/role/change', '/api/role/delete', '/api/role/one',
            '/api/user/save','/api/user/delete',
        ];
        $dev = [
            '/demo/table/list','/demo/form/base','/demo/form/advance','/demo/icons',
        ];
        $user_info = ['/user/edit', '/api/user/change', '/api/upload/avatar'];
        if ($current != '//') {
            if (in_array($current, $admin)) {
                if (!in_array(1, $role)) {
                    echo 'not admin';
                    die;
                }
            } else if (in_array($current, $dev)) {
                if (!in_array(2, $role)) {
                    echo 'not developer';
                    die;
                }
            } else if (in_array($current, $user_info)) {
                if (!in_array(1, $role) && $request->id != $me['id']) {
                    echo 'no permissions';
                    die;
                }
            } else if (!in_array($current, $auth)) {
                echo 'forbidden';
                die;
            }
        }
        return $next($request);
    }
}
