<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/back/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/back/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/back/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/back/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Super</b>L</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">管理后台</p>
    <form action="/dologin" method="post" onsubmit="return dologin();">
      <div class="form-group has-feedback">
        <input id='phone' name='phone' type="text" class="form-control" placeholder="手机">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id='pass' name='password' type="password" class="form-control" placeholder="密码">
        <input type="hidden" class="form-control" id='uuid' value=''>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/back/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/back/js/bootstrap.min.js"></script>
<script>
  function board(){
    var phone = $('#phone').val();
    if(phone == ''){
        alert('请输入手机号');
        return false;
    }
    var pass  = $('#pass').val();
    if(pass == ''){
        alert('请输入密码');
        return false;
    }
  }
</script>
</body>
</html>
