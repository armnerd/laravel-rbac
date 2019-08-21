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
              <input type="text" class="form-control" id="name" value="<?=$info['name']?>" placeholder="请输入真实姓名">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">手机</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="phone" value="<?=$info['phone']?>" placeholder="请输入企业微信中手机号">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">邮箱</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="email" value="<?=$info['email']?>" placeholder="请输入公司邮箱">
              <input type="hidden" class="form-control" id="info_id" value='<?=$info['id']?>'>
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">密码</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="passwd" placeholder="输入新密码">
            </div>
        </div>
        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">确认密码</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="checkPasswd" placeholder="确认新密码">
            </div>
        </div>
        <?php if (in_array(1, session('role'))) { ?>
            <div class="box-body">
                <label class="col-sm-2 text-right label-syle">角色</label>
                <div class="col-sm-8">
                    <select id='roles' class="form-control select2" multiple="multiple" data-placeholder="设置角色"
                        style="width: 100%;">
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
        <?php }?>

        <div class="box-body">
            <label class="col-sm-2 text-right label-syle">头像</label>
            <div class="col-sm-4">
              <input type="text" id='file-caption-name' class="form-control" value="<?=$info['avatar']?>">
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
             <button type="submit" class="btn btn-primary" style='float: right;' onclick="edit_user();return false;">提交</button>
           </div>
        </div>
    </div>

    <div class="box box-warning" id='preview' style='display: block;'>
      <div class="box-header with-border">
        <h3 class="box-title">预览</h3>
      </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="form-control photo_frame">
              <img class="photo" src="<?=$info['avatar']?>">
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
    var id = $('#info_id').val();
    var fileData = document.getElementById('avatar');
    var file = fileData.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/api/upload/avatar',
            data:{'image_url' : this.result, 'id' : id},
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
  //edit user info
  function edit_user(){
    //prepare params
    var id = $('#info_id').val();
    var name = $('#name').val();
    if(name == ''){
        failed('姓名不能为空');
        return false;
    }
    var phone = $('#phone').val();
    if(phone == ''){
        failed('手机号不能为空');
        return false;
    }
    var email = $('#email').val();
    if(email == ''){
        failed('工作邮箱不能为空');
        return false;
    }
    var avatar = $('#file-caption-name').val();
    if(avatar == ''){
        failed('头像不能为空');
        return false;
    }
    var passwd = $('#passwd').val();
    var checkPasswd = $('#checkPasswd').val();
    if(passwd != '' && checkPasswd == ''){
        failed('请确认新登录密码');
        return false;
    }
    if(passwd !== checkPasswd ){
        failed('两次密码不一致');
        return false;
    }
    <?php if (in_array(1, session('role'))) { ?>
        var roles = $('#roles').val();
        if(roles.length == 0){
            failed('请输入角色');
            return false;
        }
    <?php } else {?>
        var roles = '';
    <?php }?>

    var params = {
        'id' : id,
        'name'   : name,
        'phone'  : phone, 
        'email'  : email,
        'avatar' : avatar,
        'roles'  : roles,
    };
    if(passwd != ''){
      params.password = passwd;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url  : '/api/user/change',
        data : params,
        dataType:'json',
        type : 'post',
        success:function(mes){
            success(mes.message)
            if(mes.code == 200){
                <?php if (in_array(1, session('role'))) { ?>
                    $.pjax({ url: '/user/list', container: '#pjax-container' });
                <?php } else {?>
                    $.pjax({ url: '/', container: '#pjax-container' });
                <?php }?>
            }
        }
     });
  }
</script>
@endsection
