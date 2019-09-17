@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<!-- 头部 start -->
<div class="row">
  <div class="col-md-1">
    <!-- 筛选 start-->
    <div class="form-group">
      <select class="form-control">
	      <option value='0' >全部</option>
	      <option value='1' >API</option>
	      <option value='2' >WMS</option>
	      <option value='3' >CMS</option>
	      <option value='4' >ERP</option>
	      <option value='5' >VC</option>
	  </select>
    </div>
    <!-- 筛选 end-->
  </div>
  <div class="col-md-1">
    <!-- 操作 start-->
    <div class="form-group">
       <button type="button" class="btn btn-block btn-success" style='float: left;' onclick="add()">新增</button>
    </div>
    <!-- 操作 end-->
  </div>
  <div class="col-md-7">
  </div>
  <div class="col-md-3">
    <!-- 搜索 start-->
    <div class="form-group">
      <label>搜索</label>
      <input type="text" class="form-control" placeholder="请输入 ...">
    </div>
    <!-- 搜索 end-->
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
            <th>序号</th>
            <th>需求名称</th>
            <th>产品经理</th>
            <th>开发团队</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <?php
          foreach ($list as $key => $value) {
          ?>
          <tr>
            <td><?=$value['id']?></td>
            <td><?=$value['name']?></td>
            <td><?=$manager[$value['manager']]?></td>
            <td><?=$team[$value['team']]?></td>
            <td>
              &nbsp;&nbsp;
              <a href="/project/modules/list?id=<?=$value['id']?>">
                <i class="fa fa-newspaper-o" style="color: green;"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>
          <?php
          }
          ?>
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
	$.pjax({ url: '/project/add', container: '#pjax-container' });
}
</script>
@endsection
