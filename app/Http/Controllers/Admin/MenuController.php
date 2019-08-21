<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MenuService;

class MenuController extends Controller
{
    protected $request;
    protected $menuService;

    public function __construct(Request $request, MenuService $menuService)
    {
        parent::__construct();
        $this->request = $request;
        $this->menuService = $menuService;
    }

    /**
     * menu list
     * @return view
     */
    public function list()
    {
        $data = $this->menuService->list();
        
        return view('admin.menu_list', $data);
    }

    /**
     * add new menu
     * @return view
     */
    public function add()
    {
        $data = $this->menuService->add();
        
        return view('admin.menu_add', $data);
    }

    /**
     * add new menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function save()
    {
        $params = [
            'belong' => $this->request->input('belong'),
            'title' => $this->request->input('title'),
            'icon' => $this->request->input('icon'),
            'url'  => $this->request->input('path'),
        ];
        $roles = $this->request->input('roles', []);

        $this->menuService->save($params, $roles);

        return $this->success([]);
    }

    /**
     * delete permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete()
    {
        $this->menuService->delete($this->request->id);

        return $this->success([]);
    }

    /**
     * edit menu
     * @return view
     */
    public function edit()
    {
        $data = $this->menuService->edit($this->request->id);
        
        return view('admin.menu_edit', $data);
    }

    /**
     * change menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function change()
    {
        $params = [
            'belong' => $this->request->input('belong'),
            'title'  => $this->request->input('title'),
            'icon'   => $this->request->input('icon'),
            'url'    => $this->request->input('path'),
        ];
        $roles = $this->request->input('roles', []);
        
        $this->menuService->change($this->request->input('id'), $params, $roles);

        return $this->success([]);
    }
}
