<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 登录
Route::get('login', 'HomeController@login');
Route::post('dologin', 'HomeController@dologin');
Route::get('logout', 'HomeController@logout');

Route::group(['middleware' => ['check']], function () {
    // RBAC
    Route::get('/', 'HomeController@index');
    Route::get('user/list', 'Admin\UserController@list');//用户列表
    Route::get('user/add', 'Admin\UserController@add');//增加用户
    Route::get('user/edit', 'Admin\UserController@edit');//编辑用户
    Route::get('menu/list', 'Admin\MenuController@list');//菜单列表
    Route::get('menu/add', 'Admin\MenuController@add');//新增菜单
    Route::get('menu/edit', 'Admin\MenuController@edit');//编辑菜单
    Route::get('role/list', 'Admin\RoleController@list');//角色管理
    Route::get('permission/list', 'Admin\PermissionController@list');//权限管理
    Route::post('api/menu/save', 'Admin\MenuController@save');//菜单管理
    Route::post('api/menu/change', 'Admin\MenuController@change');
    Route::post('api/menu/delete', 'Admin\MenuController@delete');
    Route::post('api/permission/save', 'Admin\PermissionController@save');//权限相关
    Route::post('api/permission/one', 'Admin\PermissionController@info');
    Route::post('api/permission/change', 'Admin\PermissionController@change');
    Route::post('api/permission/delete', 'Admin\PermissionController@delete');
    Route::post('api/role/save', 'Admin\RoleController@save');//角色相关
    Route::post('api/role/one', 'Admin\RoleController@info');
    Route::post('api/role/change', 'Admin\RoleController@change');
    Route::post('api/role/delete', 'Admin\RoleController@delete');
    Route::post('api/user/save', 'Admin\UserController@save');//用户相关
    Route::post('api/user/change', 'Admin\UserController@change');
    Route::post('api/user/delete', 'Admin\UserController@delete');
    Route::post('api/upload/avatar', 'Admin\UserController@upload');//上传头像
    // Route::get('oprate/logs', 'Admin\OprateController@logs');//管理端日志
    

    // 页面开发示例
    Route::get('demo/table/list', 'Admin\DemoController@list');
    Route::get('demo/form/base', 'Admin\DemoController@base');
    Route::get('demo/form/advance', 'Admin\DemoController@advance');
    Route::get('demo/icons', 'Admin\DemoController@icons');
});

// 项目规划
Route::get('project/list', 'ProjectController@index');
Route::get('project/add', 'ProjectController@add');
Route::post('project/save', 'ProjectController@save');
Route::post('project/del', 'ProjectController@del');

// 功能拆分
Route::get('project/modules/list', 'ModulesController@index');
Route::get('project/modules/add', 'ModulesController@add');
Route::get('project/modules/edit', 'ModulesController@edit');
Route::post('project/modules/save', 'ModulesController@save');
Route::post('project/modules/del', 'ModulesController@del');
Route::get('project/modules/developer', 'ModulesController@developer');
Route::post('project/modules/developer/change', 'ModulesController@change');
