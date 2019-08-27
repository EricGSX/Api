@extends('layout.main')
@section('main-content')
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <style>
                [v-cloak]{
                    display: none;
                }
    </style>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles List
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row" id="app">
      @include('layout.error')
        <section class="  connectedSortable">
          <div class="nav-tabs-custom">
              <form class="form-inline" method='get' style="padding:10px 0px 10px 10px;">
                  <div class="form-group col-md-3">
                    <label style="width: 20%;">User</label>
                    <select class="form-control selectpicker" id="allUsers"  data-live-search="true"  autocomplete="off" style="width: 70%;"  v-cloak>
                                <option> -- 请选择用户 -- </option>
                        @foreach($allUsers as $allUser)
                            @if($allUser->id == $users)
                                <option selected="selected" value="{{$allUser->id}}">{{$allUser->id}}</option>
                            @else
                                <option value="{{$allUser->id}}">{{$allUser->id}}</option>
                            @endif
                        @endforeach
                    </select>
                  </div>
                  <button type="button" class="btn btn-primary btn-sm" @click="searchUser()">Search</button>
              </form>
              <p><b> </b></p>
              <form method='POST' action="/roles/assign">
                  @if($users)
                  <div id="roleLists">
                      {{csrf_field()}}
                      <input type="hidden" name="rolesUser" value="{{$users}}">
                      @foreach ($allModules as $module)
                          <ul class="list-group">
                          <li class="list-group-item list-group-item-success">{{$module->display_name}}</li>
                          <li class="list-group-item ">
                              @foreach($allActions as $key=>$action)
                                  @if($key == $module->display_name)
                                      @foreach($action as $ac)
                                          @if($ac['action_name'] != null)
                                              <label class="checkbox-inline">
                                                  @if(in_array($ac['modules_name'].'-' . $ac['action_name'],$userRoles))
                                                   <input type="checkbox" value="{{$ac['modules_name'].'-' . $ac['action_name']}}" name="checkedRoles[]" checked="checked">
                                                  @else
                                                   <input type="checkbox" value="{{$ac['modules_name'].'-' . $ac['action_name']}}" name="checkedRoles[]">
                                                  @endif
                                              {{$ac['action_display_name']}}
                                          </label>
                                          @endif
                                      @endforeach
                                  @endif
                              @endforeach
                          </li>
                        </ul>
                      @endforeach
                  </div>
              <p style="float: right;padding-bottom: 10px;">
                  <button class="btn btn-primary" type="submit">Save Roles</button>
              </p>
                  @endif
            </form>
          </div>
        </section>
       <section class="col-lg-12 connectedSortable">
          <div class="nav-tabs-custom">
              <p style="font-weight: bold;padding: 10px;">使用说明：</p>
              <p>1、下拉框可搜索选中待操作用户信息</p>
              <p>2、如有疑问请联系管理员Will/Mungo/Eric</p>
              <p style="height: 10px;"></p>
          </div>
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>
<script>
//window.onload=function(){
var cache = [];
    var vm = new Vue({
        el:'#app',
        data:{
        },
        mounted:function(){
        },
        methods:{
            searchUser:function(){
                var nowUser = $('#allUsers').val();
                var hrefUrl = '/roles?user=' + nowUser;
                window.location.href=hrefUrl;
            },
        }
    })
//}
</script>
@endsection