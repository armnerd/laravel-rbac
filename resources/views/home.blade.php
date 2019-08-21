@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<div class="row">
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3>150</h3>

      <p>New Orders</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green">
    <div class="inner">
      <h3>53<sup style="font-size: 20px">%</sup></h3>

      <p>Bounce Rate</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>44</h3>

      <p>User Registrations</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-red">
    <div class="inner">
      <h3>65</h3>

      <p>Unique Visitors</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
</div>

<!-- Main row -->
<div class="row">
	<!-- Left col -->
	<section class="col-lg-6 connectedSortable">

	  <!-- TO DO List -->
	  <div class="box box-primary">
	    <div class="box-header">
	      <i class="fa fa-calendar-minus-o"></i>
	      <h3 class="box-title">计划任务</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
	      <ul class="todo-list">
	        <li>
	          <!-- drag handle -->
	          <span class="handle">
	                <i class="fa fa-ellipsis-v"></i>
	                <i class="fa fa-ellipsis-v"></i>
	              </span>
	          <!-- todo text -->
	          <span class="text">项目上线</span>
	          <!-- Emphasis label -->
	          <small class="label label-danger"><i class="fa fa-clock-o"></i> 一周前</small>
	          <!-- General tools such as edit or delete-->
	          <div class="tools">
	            <i class="fa fa-edit"></i>
	            <i class="fa fa-trash-o"></i>
	          </div>
	        </li>
	        <li>
	              <span class="handle">
	                <i class="fa fa-ellipsis-v"></i>
	                <i class="fa fa-ellipsis-v"></i>
	              </span>
	          <span class="text">Make the theme responsive</span>
	          <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
	          <div class="tools">
	            <i class="fa fa-edit"></i>
	            <i class="fa fa-trash-o"></i>
	          </div>
	        </li>
	        <li>
	              <span class="handle">
	                <i class="fa fa-ellipsis-v"></i>
	                <i class="fa fa-ellipsis-v"></i>
	              </span>
	          <span class="text">Let theme shine like a star</span>
	          <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
	          <div class="tools">
	            <i class="fa fa-edit"></i>
	            <i class="fa fa-trash-o"></i>
	          </div>
	        </li>
	        <li>
	              <span class="handle">
	                <i class="fa fa-ellipsis-v"></i>
	                <i class="fa fa-ellipsis-v"></i>
	              </span>
	          <span class="text">Let theme shine like a star</span>
	          <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
	          <div class="tools">
	            <i class="fa fa-edit"></i>
	            <i class="fa fa-trash-o"></i>
	          </div>
	        </li>
	        <li>
	              <span class="handle">
	                <i class="fa fa-ellipsis-v"></i>
	                <i class="fa fa-ellipsis-v"></i>
	              </span>
	          <span class="text">Check your messages and notifications</span>
	          <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
	          <div class="tools">
	            <i class="fa fa-edit"></i>
	            <i class="fa fa-trash-o"></i>
	          </div>
	        </li>
	        <li>
	              <span class="handle">
	                <i class="fa fa-ellipsis-v"></i>
	                <i class="fa fa-ellipsis-v"></i>
	              </span>
	          <span class="text">Let theme shine like a star</span>
	          <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
	          <div class="tools">
	            <i class="fa fa-edit"></i>
	            <i class="fa fa-trash-o"></i>
	          </div>
	        </li>
	      </ul>
	    </div>
	    <!-- /.box-body -->
	    <div class="box-footer clearfix no-border">
	      <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> 增加项目</button>
	    </div>
	  </div>
	  <!-- /.box -->

	</section>
	<!-- /.Left col -->
	<!-- right col (We are only adding the ID to make the widgets sortable)-->
	<section class="col-lg-6 connectedSortable">
	  <!-- DIRECT CHAT -->
	  <div class="box box-warning direct-chat direct-chat-warning">
	    <div class="box-header with-border">
	      <h3 class="box-title">留言板</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <!-- Conversations are loaded here -->
	      <div class="direct-chat-messages">
	        <!-- Message. Default to the left -->
	        <div class="direct-chat-msg">
	          <div class="direct-chat-info clearfix">
	            <span class="direct-chat-name pull-left">Alexander Pierce</span>
	            <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
	          </div>
	          <!-- /.direct-chat-info -->
	          <img class="direct-chat-img" src="/back/img/user2-160x160.jpg" alt="message user image">
	          <!-- /.direct-chat-img -->
	          <div class="direct-chat-text">
	            Is this template really for free? That's unbelievable!
	          </div>
	          <!-- /.direct-chat-text -->
	        </div>
	        <!-- /.direct-chat-msg -->

	        <!-- Message to the right -->
	        <div class="direct-chat-msg right">
	          <div class="direct-chat-info clearfix">
	            <span class="direct-chat-name pull-right">Sarah Bullock</span>
	            <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
	          </div>
	          <!-- /.direct-chat-info -->
	          <img class="direct-chat-img" src="/back/img/user2-160x160.jpg" alt="message user image">
	          <!-- /.direct-chat-img -->
	          <div class="direct-chat-text">
	            You better believe it!
	          </div>
	          <!-- /.direct-chat-text -->
	        </div>
	        <!-- /.direct-chat-msg -->

	        <!-- Message. Default to the left -->
	        <div class="direct-chat-msg">
	          <div class="direct-chat-info clearfix">
	            <span class="direct-chat-name pull-left">Alexander Pierce</span>
	            <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
	          </div>
	          <!-- /.direct-chat-info -->
	          <img class="direct-chat-img" src="/back/img/user2-160x160.jpg" alt="message user image">
	          <!-- /.direct-chat-img -->
	          <div class="direct-chat-text">
	            Working with AdminLTE on a great new app! Wanna join?
	          </div>
	          <!-- /.direct-chat-text -->
	        </div>
	        <!-- /.direct-chat-msg -->

	        <!-- Message to the right -->
	        <div class="direct-chat-msg right">
	          <div class="direct-chat-info clearfix">
	            <span class="direct-chat-name pull-right">Sarah Bullock</span>
	            <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
	          </div>
	          <!-- /.direct-chat-info -->
	          <img class="direct-chat-img" src="/back/img/user2-160x160.jpg" alt="message user image">
	          <!-- /.direct-chat-img -->
	          <div class="direct-chat-text">
	            I would love to.
	          </div>
	          <!-- /.direct-chat-text -->
	        </div>
	        <!-- /.direct-chat-msg -->

	      </div>
	      <!--/.direct-chat-messages-->

	      <!-- Contacts are loaded here -->
	      <div class="direct-chat-contacts">
	        <ul class="contacts-list">
	          <li>
	            <a href="#">
	              <img class="contacts-list-img" src="/back/img/user2-160x160.jpg" alt="User Image">

	              <div class="contacts-list-info">
	                    <span class="contacts-list-name">
	                      Count Dracula
	                      <small class="contacts-list-date pull-right">2/28/2015</small>
	                    </span>
	                <span class="contacts-list-msg">How have you been? I was...</span>
	              </div>
	              <!-- /.contacts-list-info -->
	            </a>
	          </li>
	          <!-- End Contact Item -->
	          <li>
	            <a href="#">
	              <img class="contacts-list-img" src="/back/img/user2-160x160.jpg" alt="User Image">

	              <div class="contacts-list-info">
	                    <span class="contacts-list-name">
	                      Sarah Doe
	                      <small class="contacts-list-date pull-right">2/23/2015</small>
	                    </span>
	                <span class="contacts-list-msg">I will be waiting for...</span>
	              </div>
	              <!-- /.contacts-list-info -->
	            </a>
	          </li>
	          <!-- End Contact Item -->
	          <li>
	            <a href="#">
	              <img class="contacts-list-img" src="/back/img/user2-160x160.jpg" alt="User Image">

	              <div class="contacts-list-info">
	                    <span class="contacts-list-name">
	                      Nadia Jolie
	                      <small class="contacts-list-date pull-right">2/20/2015</small>
	                    </span>
	                <span class="contacts-list-msg">I'll call you back at...</span>
	              </div>
	              <!-- /.contacts-list-info -->
	            </a>
	          </li>
	          <!-- End Contact Item -->
	          <li>
	            <a href="#">
	              <img class="contacts-list-img" src="/back/img/user2-160x160.jpg" alt="User Image">

	              <div class="contacts-list-info">
	                    <span class="contacts-list-name">
	                      Nora S. Vans
	                      <small class="contacts-list-date pull-right">2/10/2015</small>
	                    </span>
	                <span class="contacts-list-msg">Where is your new...</span>
	              </div>
	              <!-- /.contacts-list-info -->
	            </a>
	          </li>
	          <!-- End Contact Item -->
	          <li>
	            <a href="#">
	              <img class="contacts-list-img" src="/back/img/user2-160x160.jpg" alt="User Image">

	              <div class="contacts-list-info">
	                    <span class="contacts-list-name">
	                      John K.
	                      <small class="contacts-list-date pull-right">1/27/2015</small>
	                    </span>
	                <span class="contacts-list-msg">Can I take a look at...</span>
	              </div>
	              <!-- /.contacts-list-info -->
	            </a>
	          </li>
	          <!-- End Contact Item -->
	          <li>
	            <a href="#">
	              <img class="contacts-list-img" src="/back/img/user2-160x160.jpg" alt="User Image">

	              <div class="contacts-list-info">
	                    <span class="contacts-list-name">
	                      Kenneth M.
	                      <small class="contacts-list-date pull-right">1/4/2015</small>
	                    </span>
	                <span class="contacts-list-msg">Never mind I found...</span>
	              </div>
	              <!-- /.contacts-list-info -->
	            </a>
	          </li>
	          <!-- End Contact Item -->
	        </ul>
	        <!-- /.contatcts-list -->
	      </div>
	      <!-- /.direct-chat-pane -->
	    </div>
	    <!-- /.box-body -->
	    <div class="box-footer">
	      <form action="#" method="post">
	        <div class="input-group">
	          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
	          <span class="input-group-btn">
	                <button type="button" class="btn btn-warning btn-flat">发送</button>
	              </span>
	        </div>
	      </form>
	    </div>
	    <!-- /.box-footer-->
	  </div>
	  <!--/.direct-chat -->
	</section>
	<!-- right col -->
</div>

@endsection
