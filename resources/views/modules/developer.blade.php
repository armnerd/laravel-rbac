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
        <h3 class="box-title">【测试 | 供应商及售价调整申请】 <?=$dev?>开发配置</h3>
      </div>
      <form action="/project/modules/developer/change" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>开发人员</label>
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
        <div class="box-body">
          <div class="form-group">
            <label>工时</label>
            <input type="title" id='title' name='title' class="form-control">
          </div>
          <div class="form-group">
            <label>进度</label>
            <input type="title" id='title' name='title' class="form-control">
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
$('.select2').select2()
</script>
@endsection