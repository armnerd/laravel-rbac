<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    /**
     * show list
     * @author fanzhen
     */
    public function list()
    {
        $data = [
          'main' => '示例',
          'sub'  => '列表',
        ];
        return view('demo.list', $data);
    }

    /**
     * base table
     * @author fanzhen
     */
    public function base()
    {
        $data = [
          'main' => '示例',
          'sub'  => '基础表单',
        ];
        return view('demo.base', $data);
    }

    /**
     * advance table
     * @author fanzhen
     */
    public function advance()
    {
        $data = [
          'main' => '示例',
          'sub'  => '高级表单',
        ];
        return view('demo.advance', $data);
    }

    /**
     * common icons
     * @author fanzhen
     */
    public function icons()
    {
        $data = [
          'main' => '示例',
          'sub'  => '常用图标',
        ];
        return view('demo.icons', $data);
    }
}
