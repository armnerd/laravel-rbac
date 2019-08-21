<?php
namespace App\Services;

use App\Component\ToolsComponent;
use App\Repositories\BackendRoleUsersRepository;
use App\Repositories\BackendPermissionsRepository;
use App\Repositories\BackendRolePermissionsRepository;
use App\Repositories\BackendUsersRepository;

class HomeService
{
    protected $backendUsersRepository;
    protected $backendRoleUsersRepository;
    protected $backendRolePermissionsRepository;
    protected $backendPermissionsRepository;
    protected $adminQrLoginRepository;

    public function __construct(BackendUsersRepository $backendUsersRepository, BackendRoleUsersRepository $backendRoleUsersRepository, BackendRolePermissionsRepository $backendRolePermissionsRepository, BackendPermissionsRepository $backendPermissionsRepository)
    {
        $this->backendUsersRepository = $backendUsersRepository;
        $this->backendRoleUsersRepository = $backendRoleUsersRepository;
        $this->backendRolePermissionsRepository = $backendRolePermissionsRepository;
        $this->backendPermissionsRepository = $backendPermissionsRepository;
    }

    /**
     * backend home page
     * @return array
     */
    public function index()
    {
        $data = [
            'main' => '控制台',
            'sub'  => '主页',
        ];

        return $data;
    }
}
