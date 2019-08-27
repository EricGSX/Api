@extends('layout.main')
@section('main-content')  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
          @include('layout.error')
          <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
              <p style="font-weight: bold;padding: 10px;">Add Modules</p>
              <form class="form-horizontal" method="post" action='/roles/create'>
                  {{csrf_field()}}
                  <input type="hidden" name="modules_type" value="modules">
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">模块名</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="display_name" placeholder="eg:销量下降" value='{{old('display_name')}}'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">模块方法</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="modules_name" placeholder="SalesController" value="{{old('modules_name')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                  </div>
                </form>
                              <p style="height: 100px;"></p>

          </div>
        </section>
        <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
              <p style="font-weight: bold;padding: 10px;">Add Actions</p>
              <form class="form-horizontal" method="post" action='/roles/create'>
                  {{csrf_field()}}
                  <input type="hidden" name="modules_type" value="actions">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">所处模块</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="modules_id">
                          <option>---请选择模块---</option>
                          @foreach($modules as $module)
                              @if(old('modules_id') == $module->id)
                                  <option value="{{$module->id}}" selected="selected">{{$module->display_name}}</option>
                              @else
                                  <option value="{{$module->id}}">{{$module->display_name}}</option>
                              @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">方法名</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="列表数据;展示报表;数据修改" name="display_names" value="{{ old('display_names') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">函数名</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="index;show;update" name="actions_names" value="{{old('actions_names')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                  </div>
                </form>
                <p style="height: 50px;"></p>
          </div>
        </section>
       <section class="col-lg-12 connectedSortable">
          <div class="nav-tabs-custom">
              <p style="font-weight: bold;padding: 10px;">使用说明：</p>
              <p>1、新增模块请先填写模块在增加方法</p>
              <p>2、增加Action可同时添加多个，并以英文分号分隔开(结尾请勿在使永分号分隔)</p>
              <p style="height: 10px;"></p>
          </div>
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>
<script>

</script>
@endsection