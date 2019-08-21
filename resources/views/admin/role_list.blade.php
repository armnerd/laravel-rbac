@extends('layouts.app')
@section('content')
@include('header')
<link rel="stylesheet" href="/back/css/list-btn.css">
<style type="text/css">
  .center{
    text-align: center;
  }
  td{
    text-align: center;
  }
</style>
<section class="content">
<!-- 列表 start -->
<div class="row">
  <div class="col-xs-7">
    <div class="box">
      <!-- 标题 start -->
      <div class="box-header">
        <div class="row">
          <div class="col-md-10">
            <h3 class="box-title">角色列表</h3>
          </div>
          
          <div class="col-md-1">
            <button class="btn btn-style" onclick="add()">
              新增
            </button>
          </div>
          <!-- <div class="col-md-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="请输入 ...">
            </div>
          </div> -->
        </div>
      </div>
      <!-- 标题 end -->
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th class='center'>序号</th>
            <th class='center'>名称</th>
            <th class='center'>创建时间</th>
            <th class='center'>操作</th>
          </tr>
          </thead>
          <tbody>

          <?php
          foreach ($list['data'] as $key => $value) {
          ?>
          <tr>
            <td>{{$value['id']}}</td>
            <td>{{$value['name']}}</td>
            <td>{{$value['created_at']}}</td>
            <td>
              <?php
              if($value['id'] != 1){
              ?>
              &nbsp;&nbsp;
              <a href="" onclick="edit(<?=$value['id']?>);return false;">
                <i class="fa fa-edit"></i>
              <a/>
              <?php
              }
              ?>
              <?php
              if($value['id'] != 1 && $value['id'] != 2){
              ?>
              &nbsp;&nbsp;
              <a href="" onclick="del(<?=$value['id']?>);return false;">
                <i class="fa fa-trash" style="color: red;"></i>
              <a/>
              <?php
              }
              ?>
            </td>
          </tr>
          <?php
          }
          ?>
          
          </tbody>
        </table>
        <!-- 分页标签 -->
        <?=$pages?>
      </div>
    </div>
  </div>
  <!-- 增加角色 -->
  <div class="col-xs-5" id='add_block' style="display: none;position: relative;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="col-md-10 col-xs-10">
          <h4 class="box-title" style="margin-top:10px;">增加角色</h4>
        </div>
        <button type="button" style='position: absolute;right:10px;' class="btn btn-box-tool" onclick="shut_add()"><i class="fa fa-times"></i></button>      
      </div>
      <form>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">名称</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="add_name" placeholder="名称">
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">权限</label>
            <div class="col-sm-8">
              <div class="checkbox">
                <?php
                foreach ($auth as $key => $value) {
                ?>
                <label>
                  <input type="checkbox" name='add_permission' value="{{$value['id']}}">{{$value['name']}}
                </label>
                <?php
                }
                ?>
              </div>
            </div>
        </div>

        <div class="box-body">
           <div class="col-sm-10">
             <button type="button" class="btn btn-primary" style='float: right;' onclick="add_role();return false;">提交</button>
           </div>
        </div>
      </form>
    </div>
  </div>
  <!-- 编辑角色 -->
  <div class="col-xs-5" id='edit_block' style="display: none;position: relative;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="col-md-10 col-xs-10">
          <h4 class="box-title" style="margin-top:10px;">编辑角色</h4>
        </div>
        <button type="button" style='position: absolute;right:10px;' class="btn btn-box-tool" onclick="shut_edit()"><i class="fa fa-times"></i></button>          
      </div>
      <form>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">名称</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_name" placeholder="名称">
              <input type="hidden" class="form-control" id="edit_id">
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">权限</label>
            <div class="col-sm-8">
              <div class="checkbox">
                <?php
                foreach ($auth as $key => $value) {
                ?>
                <label>
                  <input type="checkbox" id="permission_{{$value['id']}}" name='edit_permission' value="{{$value['id']}}">{{$value['name']}}
                </label>
                <?php
                }
                ?>
              </div>
            </div>
        </div>
        
        <div class="box-body">
           <div class="col-sm-10">
             <button type="button" class="btn btn-primary" style='float: right;' onclick="edit_role();return false;">提交</button>
           </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- 列表 end -->
<script src="/back/js/jquery.min.js"></script>
<script type="text/javascript">
  function add(){
    $('#edit_block').css('display', 'none');
    $('#add_block').css('display', 'block');
  }
  function edit(id){
    $('#add_block').css('display', 'none');
    var params = {
        'id' : id, 
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url  : '/api/role/one',
        data : params,
        dataType:'json',
        type : 'post',
        success:function(mes){
          var info = mes.data.info;
          var auth = mes.data.auth;
          $('input[name="edit_permission"]:checked').each(function(){
               $(this).removeAttr('checked');
          }); 
          for (var i=0;i<auth.length;i++)
          {
            $('#permission_'+auth[i]).attr('checked', 'checked');
          }
          $('#edit_id').val(info.id);
          $('#edit_name').val(info.name);
          $('#edit_block').css('display', 'block');
        }
    });
  }
  //删除角色
  function del(id){
    var content = '确认删除角色?';
    beforeAction(content, 'modal-danger', function(){
        var params = {
            'id' : id, 
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url  : '/api/role/delete',
            data : params,
            dataType:'json',
            type : 'post',
            success:function(mes){
                if(mes.code == 200){
                    success(mes.message);
                    $.pjax({ url: '/role/list', container: '#pjax-container' });
                }else {
                    failed(mes.message);
                }
            }
         });
    });
  }
  //展示控件
  function shut_add(){
    $('#add_block').css('display', 'none');
  }
  function shut_edit(){
    $('#edit_block').css('display', 'none');
  }
  //增加角色
  function add_role(){
    var name = $('#add_name').val();
    if(name == ''){
        failed('请输入角色名称');
        return false;
    }
    var permission = [];
    $('input[name="add_permission"]:checked').each(function(){
         var auth = $(this).val(); 
         permission.push(auth);
    }); 
    var params = {
        'name' : name, 
        'permission' : permission,
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url  : '/api/role/save',
        data : params,
        dataType:'json',
        type : 'post',
        success:function(mes){
            if(mes.code == 200){
                success(mes.message);
                $.pjax({ url: '/role/list', container: '#pjax-container' });
            }else {
                failed(mes.message);
            }
        }
     });
  }
  //更改角色
  function edit_role(){
    var id = $('#edit_id').val();
    var name = $('#edit_name').val();
    if(name == ''){
        failed('角色名称不能为空');
        return false;
    }
    var permission = [];
    $('input[name="edit_permission"]:checked').each(function(){
         var auth = $(this).val(); 
         permission.push(auth);
    }); 
    var params = {
        'id' : id,
        'name' : name, 
        'permission' : permission,
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url  : '/api/role/change',
        data : params,
        dataType:'json',
        type : 'post',
        success:function(mes){
            if(mes.code == 200){
                success(mes.message);
                $.pjax({ url: '/role/list', container: '#pjax-container' });
            }else {
                failed(mes.message);
            }
        }
     });
  }
</script>
@endsection
