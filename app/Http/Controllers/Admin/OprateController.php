<?php
namespace App\Http\Controllers\Admin;

use Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Component\ToolsComponent;
use App\Http\Controllers\Controller;

class OprateController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * admin oprate log
     * @author fanzhen
     */
    public function logs()
    {
        echo 'undo';
        die;
        $data = [
            'main' => '管理端',
            'sub'  => '日志',
        ];
        return view('admin.logs', $data);
    }
}
