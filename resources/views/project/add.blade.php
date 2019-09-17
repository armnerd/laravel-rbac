@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-7">
    <!-- 需求信息 start -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">需求信息</h3>
      </div>
      <form action="/project/save" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>选择团队</label>
            <select id='team' name='team' class="form-control">
              <option value='0' >请选择</option>
              <option value='1' >API</option>
              <option value='2' >WMS</option>
              <option value='3' >CMS</option>
              <option value='4' >ERP</option>
              <option value='5' >VC</option>
            </select>
          </div>
          <div class="form-group">
            <label>需求名称</label>
            <input type="title" id='title' name='title' class="form-control">
          </div>
          <div class="form-group">
            <label>需求文档</label>
            <input type="file" name='document'>
          </div>
          <div class="form-group">
            <label>产品经理</label>
            <select name='manager' class="form-control">
              <option value='0' >请选择</option>
              <option value='1' >张三</option>
              <option value='2' >李四</option>
              <option value='3' >王五</option>
              <option value='4' >赵六</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">提交</button>
        </div>
      </form>
    </div>
    <!-- 需求信息 end -->

  </div>
  <div class="col-md-4"></div>
</div>

<script src="/back/js/jquery.min.js"></script>
<!-- 列表 end -->
<script type="text/javascript">
// undo
</script>
@endsection
