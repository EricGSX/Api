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
                  <button type="button" class="btn btn-primary btn-sm" @click="assinRole()">Search</button>
              </form>
              <p><b> </b></p>
                  <div id="roleLists">
                      @foreach ($roles as $role)
                        <ul class="list-group">
                          <li class="list-group-item list-group-item-success">{{$role['name']}}</li>
                          <li class="list-group-item ">
                              @foreach($role['content'] as $action)
                               <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox1" value="{{$action['content']}}" v-model="checkedRoles"> {{$action['name']}}
                                </label>
                               @endforeach
                          </li>
                        </ul>
                      @endforeach
                  </div>
              <p v-cloak>当前选择用户为：<b>@{{username}}</b></p>
              <p v-cloak>当前选择值为：<b>@{{checkedRoles}}</b></p>
              <p style="float: right;padding-bottom: 10px;">
                  <button class="btn btn-primary" >Save Roles</button>
              </p>

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
            checkedRoles:[],
            username:'{{$users}}',
            roles:[],
//            roleLists:[{"name":"aaa","content":[{"name":"aaa","content":"addrole"},{"name":"aaa","content":"update"}]},{"name":"aaa","content":[{"name":"aaa","content":"addrole2"},{"name":"aaa","content":"update2"}]}],
        },
        mounted:function(){
        },
        methods:{
            assinRole:function(){
                var nowUser = $('#allUsers').val();
                var hrefUrl = '/roles?user=' + nowUser;
                window.location.href=hrefUrl;
            }
        }
    })
//}
</script>
@endsection