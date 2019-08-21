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
          <div class="col-md-10 col-xs-10">
            <h3 class="box-title">权限列表</h3>
          </div>
          <div class="col-md-1 col-xs-1">
              <button class="btn btn-style"onclick="add()">
                新增
              </button>
          </div>
          <!-- <div class="col-md-3 col-xs-3">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="请输入 ...">
            </div>
          </div> -->
        </div>
      </div>
      <!-- 标题 end -->
      <div class="box-body">
        <!-- 主体 start -->
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th class='center'>序号</th>
            <th class='center'>名称</th>
            <th class='center'>路由</th>
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
            <td onmouseover="checkinfo(<?=$value['id']?>)" onmouseout="hideinfo(<?=$value['id']?>)">
              <span class="label label-success" >详情</span>
              <div id="info_{{$value['id']}}" style="display: none;">
                <?=str_replace(';', '<br>', $value['http_path'])?>
              </div>
            </td>
            <td>{{$value['created_at']}}</td>
            <td>
                <?php
                if (!in_array($value['id'], [1,2,3,4])) {
                    ?>
              &nbsp;&nbsp;
              <a href="" onclick="edit(<?=$value['id']?>);return false;">
                <i class="fa fa-edit"></i>
              <a/>
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
        <!-- 主体 end -->
        <?=$pages?>
      </div>
    </div>
  </div>
  <!-- 增加弹窗 -->
  <div class="col-xs-5" id='add_block' style="display: none;position: relative;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="col-md-10 col-xs-10">
          <h4 class="box-title" style="margin-top:10px;">增加权限</h4>
        </div>
        <button type="button" style='position: absolute;right:10px;' class="btn btn-box-tool" onclick="shut_add()"><i class="fa fa-times"></i></button> 
      </div>
      <form>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">名称</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="add_tittle" placeholder="名称">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">HTTP<br>路径</label>
            <div class="col-sm-8">
              <textarea class="form-control" rows="5" id="add_http_path" placeholder="多个路径请用英文分号;隔开"></textarea>
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-style">菜单</label>
            <div class="col-sm-8">
              <select id = 'menu' class="form-control" style="margin-top:-5px;">
                <option value = '0'>无</option>
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
           <div class="col-sm-10">
             <button type="button" class="btn btn-primary" style='float: right;' onclick="add_permission();return false;">提交</button>
           </div>
        </div>
      </form>
    </div>
  </div>

  <!-- 编辑弹窗 -->
  <div class="col-xs-5" id='edit_block' style="display: none;position: relative;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="col-md-10 col-xs-10">
          <h4 class="box-title" style="margin-top:10px;">编辑权限</h4>
        </div>
        <button type="button" style='position: absolute;right:10px;' class="btn btn-box-tool" onclick="shut_edit()"><i class="fa fa-times"></i></button>          
      </div>
      <form>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">名称</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_tittle" placeholder="名称">
              <input type="hidden" class="form-control" id="edit_id">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">HTTP<br>路径</label>
            <div class="col-sm-8">
              <textarea class="form-control" rows="5" id="edit_http_path" placeholder="多个路径请用英文分号;隔开"></textarea>
            </div>
        </div>
        <div class="box-body">
           <div class="col-sm-10">
             <button type="button" class="btn btn-primary" style='float: right;' onclick="edit_permission();return false;">提交</button>
           </div>
        </div>
      </form>
    </div>
  </div>

</div>

<!-- 列表 end -->
<script src="/back/js/jquery.min.js"></script>
<script type="text/javascript">
  //display component
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
        url  : '/api/permission/one',
        data : params,
        dataType:'json',
        type : 'post',
        success:function(mes){
          var info = mes.data.info;
          $('#edit_id').val(info.id);
          $('#edit_tittle').val(info.name);
          $('#edit_http_path').val(info.http_path);
          $('#edit_block').css('display', 'block');
        }
    });
  }
  //delete permission
  function del(id){
    var content = '确认删除权限?';
    beforeAction(content, 'modal-danger', function(){
        var params = {
            'id' : id, 
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url  : '/api/permission/delete',
            data : params,
            dataType:'json',
            type : 'post',
            success:function(mes){
                if(mes.code == 200){
                    success(mes.message);
                    $.pjax({ url: '/permission/list', container: '#pjax-container' });
                }else {

                }
            }
         });
    });
  }
  //shutdown component
  function shut_add(){
    $('#add_block').css('display', 'none');
  }
  function shut_edit(){
    $('#edit_block').css('display', 'none');
  }
  //add new permission
  function add_permission(){
    var menu = $('#menu').val();
    var title = $('#add_tittle').val();
    if(title == ''){
        failed('请输入权限名称');
        return false;
    }
    var http_path = $('#add_http_path').val();
    if(http_path == ''){
        failed('请输入权限路由');
        return false;
    }
    var params = {
        'name' : title, 
        'menu' : menu,
        'http_path'  : http_path,
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url  : '/api/permission/save',
        data : params,
        dataType:'json',
        type : 'post',
        success:function(mes){
            if(mes.code == 200){
                success(mes.message);
                $.pjax({ url: '/permission/list', container: '#pjax-container' });
            }else {

            }
        }
     });
  }
  //edit permission
  function edit_permission(){
    var id = $('#edit_id').val();
    var title = $('#edit_tittle').val();
    if(title == ''){
        failed('权限名称不能为空');
        return false;
    }
    var http_path = $('#edit_http_path').val();
    if(http_path == ''){
        failed('请输入权限路由不能为空');
        return false;
    }
    var params = {
        'id' : id,
        'name' : title, 
        'http_path'  : http_path,
    };
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url  : '/api/permission/change',
      data : params,
      dataType:'json',
      type : 'post',
      success:function(mes){
          if(mes.code == 200){
              success(mes.message);
              $.pjax({ url: '/permission/list', container: '#pjax-container' });
          }else {
              failed(mes.message);
          }
      }
   });
  }
  //check info 
  function checkinfo(id){
    $("#info_"+id).css('display', 'block');
  }
  //hide info 
  function hideinfo(id){
    $("#info_"+id).css('display', 'none');
  }
</script>
@endsection
