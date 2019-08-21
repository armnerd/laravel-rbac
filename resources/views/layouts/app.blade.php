@inject('widget', 'App\Component\WidgetComponent')
<?php
$menu = $widget->getMenu();
$me   = $widget->getLoginUser();
$role = $widget->getRoles();
$origin = $widget->getCurrentPage();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SuperL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/back/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/back/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/back/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/back/css/jquery-jvectormap.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/back/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/back/css/select2.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="/back/css/bootstrap-timepicker.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="/back/css/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/back/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/back/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/back/css/_all-skins.min.css">
  <link rel="stylesheet" href="/back/css/google_font.css">
  <link rel="stylesheet" href="/back/css/nprogress.css">
  <style type="text/css">
    .success_note{
      width: 300px;
      position: fixed;
      right: 0px;
      top:50px;
      width: 500px;
      display: none;
    }
    .failed_note{
      width: 300px;
      position: fixed;
      right: 0px;
      top:50px;
      width: 500px;
      display: none;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Super</b>L</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o" ></i>
              <!-- <span class="label label-success">1</span> -->
            </a>
            <!-- <ul class="dropdown-menu">
              <li class="header">你有0条未读消息</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/back/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        产品
                        <small><i class="fa fa-clock-o"></i> 5 分钟前</small>
                      </h4>
                      <p>你有一个新功能需要开发</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">查看所有</a></li>
            </ul> -->
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{$me['avatar']}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{$me['name']}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{$me['avatar']}}" class="img-circle" alt="User Image">

                <p>
                  {{$me['name']}} - {{$me['position']}}
                  <small>{{date('Y 年 m 月 d 日', strtotime($me['created_at']))}} 加入</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/user/edit?id={{$me['id']}}" class="btn btn-default btn-flat">设置</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">退出</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{$me['avatar']}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$me['name']}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="" method="post" class="sidebar-form" onsubmit="return false;">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="搜索">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">导航栏</li>
        <!-- <li class="active treeview menu-open"> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>控制台</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/"><i class="fa fa-pie-chart"></i>主页</a></li>

            <?php
            if (in_array(1, $role)) {
                ?>
            <li><a href="/user/list"><i class="fa fa-users"></i>用户</a></li>
            <li><a href="/role/list"><i class="fa fa-user"></i>角色</a></li>
            <li><a href="/permission/list"><i class="fa fa-ban"></i>权限</a></li>
            <li><a href="/menu/list"><i class="fa fa-bars"></i>菜单</a></li>
            <!-- <li><a href="/oprate/logs" onclick="return false;"><i class="fa fa-history"></i>日志</a></li> -->
                <?php
            }
            ?>
            
          </ul>
        </li>

        <?php foreach ($menu as $key => $value) {
            ?>
        <li class="treeview <?=$key == $origin ? 'menu-open' : ''?>">
          <a href="#">
            <i class="fa {{$value['icon']}}"></i> <span>{{$value['title']}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <?php
            if (isset($value['sub'])) {
                ?>
          <ul class="treeview-menu" style="<?=$key == $origin ? 'display: block;' : ''?>">
                <?php
                foreach ($value['sub'] as $k => $v) {
                    ?>
            <li><a href="{{$v['url']}}"><i class="fa {{$v['icon']}}"></i> {{$v['title']}}</a></li>
                    <?php
                }
                ?>
          </ul>
                <?php
            }
            ?>
        </li>
        <?php }?>

        <?php
        if (in_array(2, $role)) {
            ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>开发示例</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/demo/table/list"><i class="fa fa-circle-o"></i> 通用列表</a></li>
            <li><a href="/demo/form/base"><i class="fa fa-circle-o"></i> 基础表单</a></li>
            <li><a href="/demo/form/advance"><i class="fa fa-circle-o"></i> 高级表单</a></li>
            <li><a href="/demo/icons"><i class="fa fa-circle-o"></i> 常用图标</a></li>
          </ul>
        </li>
            <?php
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="pjax-container">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <!-- alert -->
  <div id='failed_note' class="alert alert-danger alert-dismissible failed_note">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
    <p id='failed_msg'>message</p>
  </div>
  <div id='success_note' class="alert alert-success alert-dismissible success_note">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
    <p id='success_msg'>message</p>
  </div>

  <!-- before action -->
  <div class="modal fade in" id="modal-template" data-type='' style="display: none; padding-right: 15px;">
    <div class="modal-dialog">
      <div class="modal-content" style='margin-top:300px;'>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" onclick='closeModal()'>×</span></button>
          <h4 class="modal-title">注意</h4>
        </div>
        <div class="modal-body" style="text-align: center;font-size: 30px;">
          <p id='before_content'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick='closeModal()'>取消</button>
          <button id='doAction' action-id=0 action-title='' type="button" class="btn btn-outline">确定</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>ZaneFan</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/back/js/jquery.min.js"></script>
<script src="/back/js/jquery.pjax.js"></script>
<script src="/back/js/nprogress.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/back/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/back/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/back/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="/back/js/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="/back/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/back/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="/back/js/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="/back/js/Chart.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/back/js/demo.js"></script>
<!-- DataTables -->
<script src="/back/js/jquery.dataTables.min.js"></script>
<script src="/back/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="/back/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="/back/js/moment.min.js"></script>
<!-- bootstrap datepicker -->
<script src="/back/js/bootstrap-datepicker.js"></script>
<!-- bootstrap time picker -->
<script src="/back/js/bootstrap-timepicker.min.js"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
  //for alert
  function success(msg){
    $('#success_msg').html(msg);
    $('#success_note').css('display', 'block');
    setTimeout(function(){
      $('#success_note').css('display', 'none');
    }, 3000);
  }
  function failed(msg){
    $('#failed_msg').html(msg);
    $('#failed_note').css('display', 'block');
    setTimeout(function(){
      $('#failed_note').css('display', 'none');
    }, 3000);
  }
  
  //before action
  //type = ['modal-success', 'modal-warning', 'modal-danger']
  function beforeAction(content, type, callback){
    $('#before_content').html(content);
    $('#modal-template').addClass(type);
    $('#modal-template').attr('data-type', type);
    $('#modal-template').css('display', 'block');
    $("#doAction").bind("click", function(){
      callback();
      $('#modal-template').css('display', 'none');
      $("#modal-template").removeClass(type);
      $("#doAction").off();
    });
  }
  function closeModal(){
    $('#modal-template').css('display', 'none');
    var type = $('#modal-template').attr('data-type');
    $("#modal-template").removeClass(type);
    $("#doAction").off();
  }
</script>

<!-- pjax -->
<script>
    $(document).pjax('a', '#pjax-container');
    $(document).on('pjax:start', function() { 
      NProgress.start(); 
    });
    $(document).on('pjax:end', function() { 
      NProgress.done();
    });
    $(document).on("pjax:timeout", function(event) {
        event.preventDefault()
    });
    $(document).on('submit', 'form[pjax-container]', function (event) {
        $.pjax.submit(event, '#pjax-container');
    });
</script>

</body>
</html>
