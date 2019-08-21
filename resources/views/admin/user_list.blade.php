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
<!-- 头部 start -->
<div class="row">
    <div class="col-md-11">
    </div>
    <div class="col-md-1 form-group">
        <a href="/user/add" type="button" class="btn btn-block btn-style">新增</a>
    </div>
</div>
<!-- 头部 end -->

<!-- 列表 start -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <!-- 标题 start -->
      <div class="box-header">
        <h3 class="box-title">后台用户列表</h3>
      </div>
      <!-- 标题 end -->
      <div class="box-body">
        <!-- 主体 start -->
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th class='center'>序号</th>
            <th class='center'>姓名</th>
            <th class='center'>手机</th>
            <th class='center'>邮箱</th>
            <th class='center'>角色</th>
            <th class='center'>openid</th>
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
            <td>{{$value['phone']}}</td>
            <td>{{$value['email']}}</td>
            <td>
              <?php
              $num = 1;
              foreach ($value['roles'] as $role) {
                echo '<span class="label label-success">'.$role.'</span>&nbsp;';
                if($num % 3 == 0){
                  echo '<br><br>';
                }
                $num ++;
              }             
              ?>
            </td>
            <td>{{$value['openid']}}</td>
            <td>{{$value['created_at']}}</td>
            <td>
              <?php
              if($value['id'] != 1){
              ?>
              &nbsp;&nbsp;
              <a href="/user/edit?id={{$value['id']}}">
                <i class="fa fa-edit"></i>
              <a/>
              &nbsp;&nbsp;
              <a href="" onclick='del(<?=$value['id']?>);return false;'>
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
</div>
<script src="/back/js/jquery.min.js"></script>
<!-- 列表 end -->
<script type="text/javascript">
//delete role
function del(id){
  var content = '确认删除用户?';
  beforeAction(content, 'modal-danger', function(){
      var params = {
          'id' : id, 
      };
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url  : '/api/user/delete',
          data : params,
          dataType:'json',
          type : 'post',
          success:function(mes){ 
              if(mes.code == 200){
                  success(mes.message);
                  $.pjax({ url: '/user/list', container: '#pjax-container' });
              }else {
                  failed(mes.message);
              }
          }
       });
  });
}
</script>
@endsection
