<?php
namespace App\Component;

use App\Models\BackendMenu;
use App\Models\BackendRoleUsers;
use App\Models\BackendRoleMenu;

class WidgetComponent 
{   
    /**
     * get memu according session
     * @author fanzhen
     */
    public function getMenu()
    { 
      $menus = [];
      $who = session('user');
      $roles = session('role');
      $roleMenu = new BackendRoleMenu;
      $menuIds = $roleMenu->getMenusByRoles($roles);
      if(!empty($menuIds)){
        $menuModel = new BackendMenu;
        $menus = $menuModel->getMenuByIds($menuIds);
      }
      return $menus;
    } 

    /**
     * get login user info
     * @author fanzhen
     */
    public function getLoginUser()
    {
      return session('user');
    } 

    /**
     * get login user roles
     * @author fanzhen
     */
    public function getRoles()
    {
      return session('role');
    } 

    /**
     * get current page
     * @author fanzhen
     */
    public function getCurrentPage()
    {
      $url = \Request::getRequestUri();
      $menuModel = new BackendMenu;
      $root = $menuModel->getMenuOrigin($url);
      return $root;
    } 
}
