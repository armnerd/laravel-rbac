@extends('layouts.app')
@section('content')
@include('header')
<section class="content">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-7">
    <!-- 快速示例 start -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">快速示例</h3>
      </div>
      <form>
        <div class="box-body">
          <div class="form-group">
            <label>邮箱</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="邮箱地址">
          </div>
          <div class="form-group">
            <label>密码</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="密码">
          </div>
          <div class="form-group">
            <label>文件上传</label>
            <input type="file" id="exampleInputFile">
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">提交</button>
        </div>
      </form>
    </div>
    <!-- 快速示例 end -->

    <!-- 通用元素 start -->
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">通用元素</h3>
      </div>
      <div class="box-body">
        <form>
          <!-- 文本输入 -->
          <div class="form-group">
            <label>文本</label>
            <input type="text" class="form-control" placeholder="输入 ...">
          </div>
          <div class="form-group">
            <label>禁用的文本</label>
            <input type="text" class="form-control" placeholder="输入 ..." disabled>
          </div>

          <!-- 大段文本 -->
          <div class="form-group">
            <label>大段文本</label>
            <textarea class="form-control" rows="3" placeholder="输入 ..."></textarea>
          </div>
          <div class="form-group">
            <label>禁用的大段文本</label>
            <textarea class="form-control" rows="3" placeholder="输入 ..." disabled></textarea>
          </div>

          <!-- 输入状态 -->
          <div class="form-group has-success">
            <label class="control-label"><i class="fa fa-check"></i>输入成功</label>
            <input type="text" class="form-control" id="inputSuccess" placeholder="输入 ...">
            <span class="help-block">成功信息</span>
          </div>
          <div class="form-group has-warning">
            <label class="control-label"><i class="fa fa-bell-o"></i> 输入警告</label>
            <input type="text" class="form-control" id="inputWarning" placeholder="输入 ...">
            <span class="help-block">警告信息</span>
          </div>
          <div class="form-group has-error">
            <label class="control-label"><i class="fa fa-times-circle-o"></i> 输入错误</label>
            <input type="text" class="form-control" id="inputError" placeholder="输入 ...">
            <span class="help-block">失败信息</span>
          </div>

          <!-- 多选 start -->
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox">
                多选 1
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox">
                多选 2
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" disabled>
                多选 失效
              </label>
            </div>
          </div>
          <!-- 多选 end -->

          <!-- 单选 start -->
          <div class="form-group">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                单选 1
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                单选 2
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                单选 失效
              </label>
            </div>
          </div>
          <!-- 单选 end -->

          <!-- 下拉 start -->
          <div class="form-group">
            <label>下拉</label>
            <select class="form-control">
              <option>张三</option>
              <option>李四</option>
              <option>王五</option>
              <option>赵六</option>
            </select>
          </div>
          <div class="form-group">
            <label>下拉失效</label>
            <select class="form-control" disabled>
              <option>张三</option>
              <option>李四</option>
              <option>王五</option>
              <option>赵六</option>
            </select>
          </div>
          <!-- 下拉 end -->

        </form>
      </div>
    </div>
    <!-- 通用元素 end -->

  </div>
  <div class="col-md-4"></div>
</div>

@endsection
