@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<!-- 列表 start -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <!-- 标题 start -->
      <div class="box-header">
        <h3 class="box-title">需求信息</h3>
      </div>
      <!-- 标题 end -->
      <div class="box-body">
        <!-- 主体 start -->
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>需求名称</th>
            <th>产品经理</th>
            <th>开发团队</th>
            <th>需求文档</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?=$scheduleInfo['name']?></td>
            <td><?=$manager[$scheduleInfo['manager']]?></td>
            <td>
              <select id='team' name='team' class="form-control">
                <option selected="selected"><?=$team[$scheduleInfo['team']]?></option>
              </select>
            </td>
            <td>
              <a href="/">
                <?=$scheduleInfo['document']?>
              </a>
              <input type="file" name='document'>
            </td>
          </tr>
          </tbody>
        </table>
        <!-- 主体 end -->
      </div>
    </div>
  </div>
</div>

<!-- 头部 start -->
<div class="row" style="margin-bottom: 10px;">
  <div class="col-md-1">
    <!-- 操作 start-->
    <div class="form-group">
       <button type="button" class="btn btn-block btn-success" style='float: left;' onclick="add()">新增模块</button>
    </div>
    <!-- 操作 end-->
  </div>
  <div class="col-md-11">
  </div>
</div>
<!-- 头部 end -->

<!-- 列表 start -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <!-- 标题 start -->
      <div class="box-header">
        <h3 class="box-title">需求列表</h3>
      </div>
      <!-- 标题 end -->
      <div class="box-body">
        <!-- 主体 start -->
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th rowspan="2" >序号</th>
            <th rowspan="2" >优先级</th>
            <th rowspan="2" >功能点</th>
            <th colspan="3" >开发人员</th>
            <th rowspan="2" >测试人员</th>
            <th rowspan="2" >时间节点</th>
            <th rowspan="2" >当前状态</th>
            <th rowspan="2" >备注</th>
            <th rowspan="2" >操作</th>
          </tr>
          <tr>
            <th>前端</th>
            <th>接口</th>
            <th>后端</th>
          </tr>
          </thead>
          <tbody>

          <tr>
          	<td>1</td>
          	<td>
              <select id='priority' name='priority' class="form-control priority">
                <option value='1' selected="selected">高</option>
                <option value='2' >中</option>
                <option value='3' >低</option>
              </select>
            </td>
          	<td>供应商及售价调整申请</td>
            <td>
            	<a href="/project/modules/developer?dev=fre">
            	开发者：张三、赵六<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	<a href="/project/modules/developer?dev=api">
            	开发者：李四<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	<a href="/project/modules/developer?dev=bak">
            	开发者：王五<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	张三<br/>
            	李四<br/>
            	王五<br/>
            </td>
            <td>
            	启动时间：<?=date('Y-m-d', time())?><br/>
            	提测时间：<?=date('Y-m-d', time())?><br/>
            	上线时间：<?=date('Y-m-d', time())?><br/>
            </td>
            <td>
              <select id='status' name='status' class="form-control status">
                <option value='1' selected="selected">开发中</option>
                <option value='2' >测试中</option>
                <option value='3' >已上线</option>
              </select>
            </td>
            <td>快特么点</td>
            <td>
              &nbsp;&nbsp;
              <a href="/project/modules/edit">
                <i class="fa fa-edit"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
            	<a href="">
	                <i class="fa fa-trash" style="color: red;"></i>
	            <a/>
            </td>
          </tr>

          <tr>
          	<td>2</td>
          	<td>
              <select id='priority' name='priority' class="form-control priority">
                <option value='1' selected="selected">高</option>
                <option value='2' >中</option>
                <option value='3' >低</option>
              </select>
            </td>
          	<td>供应商及售价调整申请</td>
            <td>
            	<a href="/project/modules/developer?dev=fre">
            	开发者：张三、赵六<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	<a href="/project/modules/developer?dev=api">
            	开发者：李四<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	<a href="/project/modules/developer?dev=bak">
            	开发者：王五<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	张三<br/>
            	李四<br/>
            	王五<br/>
            </td>
            <td>
            	启动时间：<?=date('Y-m-d', time())?><br/>
            	提测时间：<?=date('Y-m-d', time())?><br/>
            	上线时间：<?=date('Y-m-d', time())?><br/>
            </td>
            <td>
              <select id='status' name='status' class="form-control status">
                <option value='1' selected="selected">开发中</option>
                <option value='2' >测试中</option>
                <option value='3' >已上线</option>
              </select>
            </td>
            <td>快特么点</td>
            <td>
            	&nbsp;&nbsp;
              <a href="/project/modules/edit">
                <i class="fa fa-edit"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                  <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>

          <tr>
          	<td>3</td>
          	<td>
              <select id='priority' name='priority' class="form-control priority">
                <option value='1' selected="selected">高</option>
                <option value='2' >中</option>
                <option value='3' >低</option>
              </select>
            </td>
          	<td>供应商及售价调整申请</td>
            <td>
            	<a href="/project/modules/developer?dev=fre">
            	开发者：张三、赵六<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	<a href="/project/modules/developer?dev=api">
            	开发者：李四<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	<a href="/project/modules/developer?dev=bak">
            	开发者：王五<br/>
            	工期：3天<br/>
            	进度：100%<br/>
            	</a>
            </td>
            <td>
            	张三<br/>
            	李四<br/>
            	王五<br/>
            </td>
            <td>
            	启动时间：<?=date('Y-m-d', time())?><br/>
            	提测时间：<?=date('Y-m-d', time())?><br/>
            	上线时间：<?=date('Y-m-d', time())?><br/>
            </td>
            <td>
              <select id='status' name='status' class="form-control status">
                <option value='1' selected="selected">开发中</option>
                <option value='2' >测试中</option>
                <option value='3' >已上线</option>
              </select>
            </td>
            <td>快特么点</td>
            <td>
            	&nbsp;&nbsp;
              <a href="/project/modules/edit">
                <i class="fa fa-edit"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                  <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>
          </tbody>
        </table>
        <!-- 主体 end -->
      </div>
    </div>
  </div>
</div>
<!-- 列表 end -->
<!-- 列表 end -->
<script type="text/javascript">
function add(){
	$.pjax({ url: '/project/modules/add', container: '#pjax-container' });
}

$(".priority").change( function() {
  var content = '确认更改优先级?';
  beforeAction(content, 'modal-success', function(){
      // undo
  });
});

$(".status").change( function() {
  var content = '确认更改状态?';
  beforeAction(content, 'modal-success', function(){
      // undo
  });
});
</script>
@endsection