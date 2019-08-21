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
    <div class="col-md-1">
        <!-- 操作 start-->
        <div class="form-group">
           <a href="/menu/add" class="btn btn-block btn-style">新增</a>
        </div>
        <!-- 操作 end-->
    </div>
</div>
<!-- 头部 end -->

<!-- 列表 start -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <!-- 标题 start -->
      <div class="box-header">
        <h3 class="box-title">菜单列表</h3>
      </div>
      <!-- 标题 end -->
      <div class="box-body">
        <!-- 主体 start -->
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th class='center'>层级</th>
            <th class='center'>标题</th>
            <th class='center'>图标</th>
            <th class='center'>路由</th>
            <th class='center'>操作</th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($list as $key => $value) {
                ?>
          <tr style="background-color: #F9F9F9;">
            <td>
              <i class="fa fa-folder"></i>
            </td>
            <td>{{$value['title']}}</td>
            <td><i class="fa {{$value['icon']}}"></i></td>
            <td>{{$value['url']}}</td>
            <td>
              &nbsp;&nbsp;
              <a href="/menu/edit?id={{$value['id']}}">
                <i class="fa fa-edit"></i>
              <a/>
              &nbsp;&nbsp;
              <a href="" onclick="del(<?=$value['id']?>);return false;">
                <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>
                <?php
                if (isset($value['sub'])) {
                    ?>

                    <?php
                    foreach ($value['sub'] as $k => $v) {
                        ?>
          <tr>
            <td></td>
            <td>{{$v['title']}}</td>
            <td><i class="fa {{$v['icon']}}"></i></td>
            <td>{{$v['url']}}</td>
            <td>
              &nbsp;&nbsp;
              <a href="/menu/edit?id={{$v['id']}}">
                <i class="fa fa-edit"></i>
              <a/>
              &nbsp;&nbsp;
              <a href="" onclick="del(<?=$v['id']?>);return false;">
                <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>
                        <?php
                    }
                    ?>
          
                    <?php
                }
                ?>
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
<script src="/back/js/jquery.min.js"></script>
<!-- 列表 end -->
<script type="text/javascript">
//delete role
function del(id){
  var content = '确认删除菜单?';
  beforeAction(content, 'modal-danger', function(){
      var params = {
          'id' : id, 
      };
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url  : '/api/menu/delete',
          data : params,
          dataType:'json',
          type : 'post',
          success:function(mes){  
              if(mes.code == 200){
                  success(mes.message);
                  $.pjax({ url: '/menu/list', container: '#pjax-container' });
              }else {
                  failed(mes.message);
              }
          }
       });
  });
}
</script>
@endsection
