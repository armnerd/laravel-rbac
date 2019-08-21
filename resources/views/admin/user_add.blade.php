@extends('layouts.app')
@section('content')
@include('header')
<style type="text/css">
  .photo_frame{
    width: 200px;
    height: 200px;
    text-align: center;
    float: left;
    margin-left: 50px;
    margin-top: -30px;
    display: none;
    position: relative;
  }
  .photo{
    height: 160px;
    width: 160px;
    margin-top: 10px;
  }
  .delete_buttom{
    right: -1px;
    top: -5px;
    position: absolute;
  }
</style>
<section class="content">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">

    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">用户信息</h3>
      </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">姓名</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name" placeholder="请输入真实姓名">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">手机</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="phone" placeholder="请输入企业微信中手机号">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">邮箱</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="email" placeholder="请输入公司邮箱">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">密码</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="passwd" placeholder="输入密码">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">确认密码</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="checkPasswd" placeholder="确认密码">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">角色</label>
            <div class="col-sm-8">
              <select id='roles' class="form-control select2" multiple="multiple" data-placeholder="设置角色"
                    style="width: 100%;">
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
            <label class="col-sm-2 text-right label-syle">头像</label>
            <div class="col-sm-4">
              <input type="text" id='file-caption-name' class="form-control" value="">
            </div>
            <div class="input-group-btn">
                 <div tabindex="500" class="btn btn-primary btn-file">
                  <i class="glyphicon glyphicon-folder-open"></i>&nbsp;  
                  <span class="hidden-xs">上传</span>
                  <input type="file" class="avatar" name="avatar" accept="image/*" id="avatar" onchange='uploadAvatar()'>
                </div>
             </div>
        </div>

        <div class="box-body">
           <div class="col-sm-10">
             <button type="submit" class="btn btn-primary" style='float: right;' onclick="add_user();return false;">提交</button>
           </div>
        </div>
    </div>

    <div class="box box-warning" id='preview' style='display: none;'>
      <div class="box-header with-border">
        <h3 class="box-title">预览</h3>
      </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="form-control photo_frame">
              <img class="photo" src="">
              <button type="button" class="btn btn-box-tool delete_buttom" onclick="delete_pic()"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </div>
    </div>

  </div>
</div>
<script src="/back/js/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('.select2').select2()
  })
  //upload user's avatar
  function uploadAvatar(){
    var fileData = document.getElementById('avatar');
    var file = fileData.files[0];
    var size = file.size/1024;
    if(size > 300){
      failed('图片大小不能超过300kb');
      fileData.value = '';
      return
    }
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/api/upload/avatar',
            data:{'image_url' : this.result},
            success:function (result) {
                fileData.value = '';
                $('.photo').attr('src', result.data.url);
                $('#preview').css('display', 'block');
                $('.photo_frame').css('display', 'block');
                $('#file-caption-name').val(result.data.url);
            }
        });
    }
  }
  //clean the upload file
  function delete_pic(){
    $('.photo_frame').css('display', 'none');
    $('#preview').css('display', 'none');
    $('#file-caption-name').val('');
  }
  //add new user for backend
  function add_user(){
    //prepare params
    var name  = $('#name').val();
    if(name == ''){
        failed('请输入姓名');
        return false;
    }
    var phone = $('#phone').val();
    if(phone == ''){
        failed('请输入手机号');
        return false;
    }
    var email = $('#email').val();
    if(email == ''){
        failed('请输入工作邮箱');
        return false;
    }
    var avatar = $('#file-caption-name').val();
    if(avatar == ''){
        failed('请上传头像');
        return false;
    }
    var passwd = $('#passwd').val();
    if(passwd == ''){
        failed('请输入登录密码');
        return false;
    }
    var checkPasswd = $('#checkPasswd').val();
    if(checkPasswd == ''){
        failed('请确认登录密码');
        return false;
    }
    if(passwd !== checkPasswd ){
        failed('两次密码不一致');
        return false;
    }
    var roles = $('#roles').val();
    if(roles.length == 0){
        failed('请输入角色');
        return false;
    }
    var params = {
        'name'  : name,
        'phone' : phone, 
        'email' : email,
        'avatar'   : avatar,
        'password' : passwd,
        'roles' : roles,
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url  : '/api/user/save',
        data : params,
        dataType:'json',
        type : 'post',
        success:function(mes){
            success(mes.message)
            if(mes.code == 200){
                $.pjax({ url: '/user/list', container: '#pjax-container' });
            }
        }
     });
  }
</script>
@endsection
