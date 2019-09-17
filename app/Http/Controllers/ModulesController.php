<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component\ToolsComponent;
use App\Models\Schedule;
use App\Models\Module;

class ModulesController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;
    }

    /**
     * list page
     * @return view
     */
    public function index()
    {
        $scheduleId = $this->request->input('id');
        $scheduleInfo = Schedule::where(['id' => $scheduleId])->first()->toArray();
        $list = Module::where(['schedule_id' => $scheduleId])->get()->toArray();
        $team = [
            1 => 'API',
            2 => 'WMS',
            3 => 'CMS',
            4 => 'ERP',
            5 => 'VC',
        ];
        $manager = [
            1 => '张三',
            2 => '李四',
            3 => '王五',
            4 => '赵六',
        ];
        $data = [
            'main' => '项目',
            'sub'  => '详情',
            'list' => $list,
            'team' => $team,
            'manager' => $manager,
            'scheduleInfo' => $scheduleInfo,
        ];
        return view('modules/index', $data);
    }

    /**
     * add page
     * @return view
     */
    public function add()
    {
        $data = [
            'main' => '项目',
            'sub'  => '拆分',
        ];
        return view('modules/add', $data);
    }

    /**
     * edit page
     * @return view
     */
    public function edit()
    {
        $data = [
            'main' => '项目',
            'sub'  => '编辑',
        ];
        return view('modules/edit', $data);
    }

    /**
     * developer page
     * @return view
     */
    public function developer()
    {
        $dev  = $this->request->input('dev');
        $map  = [
            'fre' => '前端',
            'api' => '接口',
            'bak' => '后端',
        ];
        $data = [
            'main' => '项目',
            'sub'  => '开发者',
            'dev'  => $map[$dev],
        ];
        return view('modules/developer', $data);
    }

    /**
     * save
     *
     */
    public function save()
    {
        // undo
    }

    /**
     * del
     * @return view
     */
    public function del()
    {
        // undo
    }

    /**
     * change developer
     * @return view
     */
    public function change()
    {
        // undo
    }

}
