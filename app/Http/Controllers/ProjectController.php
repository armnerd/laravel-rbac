<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component\ToolsComponent;
use App\Models\Schedule;
use App\Models\Module;

class ProjectController extends Controller
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
        $list = Schedule::all()->toArray();
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
            'sub'  => '列表',
            'list' => $list,
            'team' => $team,
            'manager' => $manager,
        ];
        return view('project/index', $data);
    }

    /**
     * add page
     * @return view
     */
    public function add()
    {
        $data = [
            'main' => '项目',
            'sub'  => '新增',
        ];
        return view('project/add', $data);
    }

    /**
     * save
     *
     */
    public function save()
    {
        $params = [
            'team'     => $this->request->input('team'),
            'name'     => $this->request->input('title'),
            'document' => $_FILES['document']['name'],
            'manager'  => $this->request->input('manager'),
        ];
        Schedule::insertGetId($params);
        return redirect('/project/list');
    }

    /**
     * del
     * @return view
     */
    public function del()
    {
        // undo
    }

}
