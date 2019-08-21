@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<!-- 头部 start -->
<div class="row">
  <div class="col-md-1">
    <!-- 筛选 start-->
    <div class="form-group">
      <select class="form-control">
        <option>全部</option>
        <option>审核中</option>
        <option>未通过</option>
        <option>已通过</option>
        <option>已发布</option>
      </select>
    </div>
    <!-- 筛选 end-->
  </div>
  <div class="col-md-1">
    <!-- 操作 start-->
    <div class="form-group">
       <button type="button" class="btn btn-block btn-success" style='float: left;'>新增</button>
    </div>
    <!-- 操作 end-->
  </div>
  <div class="col-md-7">
  </div>
  <div class="col-md-3">
    <!-- 搜索 start-->
    <div class="form-group">
      <label>搜索</label>
      <input type="text" class="form-control" placeholder="请输入 ...">
    </div>
    <!-- 搜索 end-->
  </div>
</div>
<!-- 头部 end -->

<!-- 列表 start -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <!-- 标题 start -->
      <div class="box-header">
        <h3 class="box-title">东北F4</h3>
      </div>
      <!-- 标题 end -->
      <div class="box-body">
        <!-- 主体 start -->
        <table class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>序号</th>
            <th>姓名</th>
            <th>别名</th>
            <th>性别</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>001</td>
            <td>小沈阳</td>
            <td>莱昂纳多</td>
            <td>未知</td>
            <td>
              &nbsp;&nbsp;
              <a href="">
                <i class="fa fa-newspaper-o" style="color: green;"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-edit"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>
          <tr>
            <td>002</td>
            <td>宋小宝</td>
            <td>约翰尼</td>
            <td>未知</td>
            <td>
              &nbsp;&nbsp;
              <a href="">
                <i class="fa fa-newspaper-o" style="color: green;"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-edit"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>
          <tr>
            <td>003</td>
            <td>刘能</td>
            <td>克里斯蒂安</td>
            <td>未知</td>
            <td>
              &nbsp;&nbsp;
              <a href="">
                <i class="fa fa-newspaper-o" style="color: green;"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-edit"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>
          <tr>
            <td>004</td>
            <td>赵四</td>
            <td>尼古拉斯</td>
            <td>未知</td>
            <td>
              &nbsp;&nbsp;
              <a href="">
                <i class="fa fa-newspaper-o" style="color: green;"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-edit"></i>
              <a/>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="">
                <i class="fa fa-trash" style="color: red;"></i>
              <a/>
            </td>
          </tr>
          </tbody>
        </table>
        <!-- 主体 end -->
        <!-- 分页 start -->
        <div class="row">
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers">
              <ul class="pagination">
                <li class="paginate_button previous">
                  <a href="#">上一页</a>
                </li>
                <li class="paginate_button active">
                  <a href="#">1</a>
                </li>
                <li class="paginate_button ">
                  <a href="#">2</a>
                </li>
                <li class="paginate_button ">
                  <a href="#">3</a>
                </li>
                <li class="paginate_button ">
                  <a href="#">4</a>
                </li>
                <li class="paginate_button ">
                  <a href="#">5</a>
                </li>
                <li class="paginate_button ">
                  <a href="#">6</a>
                </li>
                <li class="paginate_button next">
                  <a href="#">下一页</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- 分页 end -->
      </div>
    </div>
  </div>
</div>
<!-- 列表 end -->

@endsection
