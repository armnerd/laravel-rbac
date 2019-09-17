@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-7">

  	<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">【测试 | 供应商及售价调整申请】 功能信息</h3>
      </div>
      <form action="/project/modules/save" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>功能名称</label>
            <input type="title" id='title' name='title' class="form-control">
          </div>
        </div>
      </form>

      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>测试人员</label>
              <select class="form-control select2" multiple="multiple" data-placeholder="选择一个人"
                      style="width: 100%;">
                <option value='1' >张三</option>
                <option value='2' >李四</option>
                <option value='3' >王五</option>
                <option value='4' >赵六</option>
                </select>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- 日期选择模块 start-->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">时间节点</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label>启动日期:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="datepicker1">
          </div>
        </div>

      </div>

      <div class="box-body">
        <div class="form-group">
          <label>提测日期:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="datepicker2">
          </div>
        </div>

      </div>

      <div class="box-body">
        <div class="form-group">
          <label>上线日期:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="datepicker3">
          </div>
        </div>

      </div>

    </div>
    <!-- 日期选择模块 end-->

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">备注信息</h3>
      </div>
      <form action="/project/modules/save" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="输入 ..."></textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">提交</button>
        </div>
      </form>
    </div>

  </div>
  <div class="col-md-4"></div>
</div>
<script src="/back/js/jquery.min.js"></script>
<script src="/back/js/bootstrap-datepicker.js"></script>
<script src="/back/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
	  $('.select2').select2()
    $('#datepicker1').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })
    $('#datepicker3').datepicker({
      autoclose: true
    })
</script>
@endsection