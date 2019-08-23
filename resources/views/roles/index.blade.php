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
              <form class="form-inline" style="padding:10px 0px 10px 10px;">
                  <div class="form-group col-md-2">
                    <label style="width: 20%;">User</label>
                    <select class="form-control selectpicker"  data-live-search="true" v-model="username" style="width: 70%;"  v-cloak>
                        <option>Eric.Guo1</option>
                        <option>Eric.Guo2</option>
                        <option>Eric.Guo3</option>
                    </select>
                  </div>
                  <button type="button" class="btn btn-primary btn-sm" @click="assinRole()">Search</button>
              </form>
                  <p>Roles Lists:{{$users}}</p>
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
                 <p v-cloak>当前选择用户为：@{{username}}</p>
                 <p v-cloak>当前选择值为：@{{checkedRoles}}</p>
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
            username:null,
            roles:[],
//            roleLists:[{"name":"aaa","content":[{"name":"aaa","content":"addrole"},{"name":"aaa","content":"update"}]},{"name":"aaa","content":[{"name":"aaa","content":"addrole2"},{"name":"aaa","content":"update2"}]}],
        },
        mounted:function(){
        },
        methods:{
            assinRole:function(){
                window.location.href="/roles?user=eric.guo";
            }
        }
    })
//}
</script>
@endsection