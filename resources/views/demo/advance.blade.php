@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-7">

    <!-- 多选模块 start-->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">多选</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>请选择</label>
              <select class="form-control select2" multiple="multiple" data-placeholder="选择一个人"
                      style="width: 100%;">
                <option>张三</option>
                <option>李四</option>
                <option>王五</option>
                <option>赵六</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 多选模块 end-->

    <!-- 日期选择模块 start-->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">日期选择</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label>开始日期:</label>

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
          <label>结束日期:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="datepicker2">
          </div>
        </div>

      </div>

    </div>
    <!-- 日期选择模块 end-->

    <!-- 时间选择模块 start-->
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">时间选择</h3>
      </div>

      <div class="box-body">
        <div class="bootstrap-timepicker">
          <div class="form-group">
            <label>开始时间:</label>
            <div class="input-group">
              <input type="text" class="form-control timepicker1">

              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="box-body">
        <div class="bootstrap-timepicker">
          <div class="form-group">
            <label>结束时间:</label>
            <div class="input-group">
              <input type="text" class="form-control timepicker2">

              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- 时间选择模块 end-->

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
    $('.timepicker1').timepicker({
      showInputs: false
    })
    $('.timepicker2').timepicker({
      showInputs: false
    })
</script>
@endsection
