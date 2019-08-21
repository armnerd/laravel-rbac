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
              <select id = 'belong' {{$info['belong'] == 0 ? 'disabled' : ''}} class="form-control"  style="margin-top:-5px;">
                <?php
                if ($info['belong'] == 0) {
                    ?>
                    <option selected value = "{{$info['belong']}}">根节点</option>
                    <?php
                } else {
                    foreach ($menus as $key => $value) {
                        ?>
                    <option {{$info['belong'] == $value['id'] ? 'selected' : ''}} value = "{{$value['id']}}">{{$value['title']}}</option>
                        <?php
                    }
                }
                ?>
              </select>
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-style">标题</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="title" value='<?=$info['title']?>' placeholder="标题" style="margin-top:-5px;">
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-style">图标</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="icon" value='<?=$info['icon']?>' placeholder="图标" style="margin-top:-5px;">
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-style">路径</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="path" value='<?=$info['url']?>' placeholder="路径" style="margin-top:-5px;">
              <input type="hidden" class="form-control" id="info_id" value='<?=$info['id']?>'>
            </div>
        </div>

        <div class="box-body">
            <label class="col-sm-2 text-right label-style">角色</label>
            <div class="col-sm-8">
              <select id='roles' class="form-control select2" multiple="multiple" data-placeholder="选择角色"
                    style="width: 100%;margin-top:-5px;">
                <?php
                foreach ($roles as $key => $value) {
                    ?>
                    <?php
                    if (in_array($value['id'], $role)) {
                        ?>
                <option selected='selected' value = "{{$value['id']}}">{{$value['name']}}</option>
                        <?php
                    } else {
                        ?>
                <option value = "{{$value['id']}}">{{$value['name']}}</option>
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
              </select>
            </div>
        </div>
        
        <div class="box-body">
           <div class="col-sm-10">
             <button type="submit" class="btn btn-primary" style='float: right;' onclick="edit();return false;">提交</button>
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
  //edit menu info
  function edit(){
    var id = $('#info_id').val();
    var title = $('#title').val();
    var belong = $('#belong').val();
    if(title == ''){
        failed('标题不能为空');
        return false;
    }
    var icon = $('#icon').val();
    if(icon == ''){
        failed('图标不能为空');
        return false;
    }
    var path = $('#path').val();
    if(belong != 0 && path == ''){
        failed('路径不能为空');
        return false;
    }
    var roles = $('#roles').val();
    // if(roles.length == 0){
    //     failed('角色不能为空');
    //     return false;
    // }
    var params = {
        'id'     : id, 
        'title'  : title,
        'icon'   : icon,
        'path'   : path,
        'roles'  : roles,
        'belong' : belong,
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url  : '/api/menu/change',
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
