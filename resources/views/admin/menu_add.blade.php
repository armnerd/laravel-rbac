@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">增加</h3>
      </div>
      <form>
        <div class="box-body">
            <label class="col-sm-2 text-right label-style">上级</label>
            <div class="col-sm-8">
              <select id = 'belong' class="form-control" style="margin-top:-5px;">
                <option value = '0'>根节点</option>
                <?php
                foreach ($menus as $key => $value) {
                ?>
                <option value = "{{$value['id']}}">{{$value['title']}}</option>
                <?php
                }
                ?>
              </select>
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-style">标题</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="title" placeholder="标题" style="margin-top:-5px;">
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-style">图标</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="icon" placeholder="图标" style="margin-top:-5px;">
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-style">路径</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="path" placeholder="路径" style="margin-top:-5px;">
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-style">角色</label>
            <div class="col-sm-8">
              <select id='roles' class="form-control select2" multiple="multiple" data-placeholder="选择角色"
                    style="margin-top:-5px;width: 100%;">
              <?php
              foreach ($roles as $key => $value) {
              ?>
              <option value = "{{$value['id']}}">{{$value['name']}}</option>
              <?php
              }
              ?>
            </select>
            </div>
        </div>

        <div class="box-body">
           <div class="col-sm-10">
             <button type="submit" class="btn btn-primary" style='float: right;' onclick="add();return false;">提交</button>
           </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-12">
    @include('icons')
  </div>
</div>
<script src="/back/js/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('.select2').select2()
  })
  //choose icon
  $(".fa").click( function () {
    var style = $(this).attr('class').replace(/fa fa-fw /, '');
    $("#icon").val(style);
    $('#icon_lib').css('display', 'none');
  });
  $("#icon").focus(function(){
    $('#icon_lib').css('display', 'block');
  });
  //add new menu
  function add(){
    var belong = $('#belong').val();
    var title  = $('#title').val();
    if(title == ''){
        failed('请输入标题');
        return false;
    }
    var icon = $('#icon').val();
    if(icon == ''){
        failed('请输入图标');
        return false;
    }
    var path = $('#path').val();
    if(belong != 0 && path == ''){
        failed('请输入路径');
        return false;
    }
    var roles = $('#roles').val();
    // if(roles.length == 0){
    //     failed('请输入角色');
    //     return false;  
    // }
    var params = {
        'belong' : belong, 
        'title'  : title,
        'icon'   : icon,
        'path'   : path,
        'roles'  : roles,
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url  : '/api/menu/save',
        data : params,
        dataType:'json',
        type : 'post',
        success:function(mes){
            success(mes.message)
            if(mes.code == 200){
                $.pjax({ url: '/menu/list', container: '#pjax-container' });
            }
        }
     });
  }
</script>
@endsection
