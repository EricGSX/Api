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
                  <p>Roles Lists:</p>
                  <div id="roleLists">
                        <ul class="list-group">
                          <li class="list-group-item list-group-item-success">权限控制</li>
                          <li class="list-group-item ">
                               <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox1" value="option1" v-model="checkedRoles"> 新增权限
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox2" value="option2" v-model="checkedRoles"> 权限管理
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox3" value="option3" v-model="checkedRoles"> 用户授权
                                </label>
                          </li>
                        </ul>
                        <ul class="list-group">
                          <li class="list-group-item list-group-item-success">销量下降</li>
                          <li class="list-group-item ">
                               <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox4" value="option4" v-model="checkedRoles"> 列表数据
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox5" value="option5" v-model="checkedRoles"> 展示报表
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox6" value="option6" v-model="checkedRoles"> 数据修改
                                </label>
                          </li>
                        </ul>
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
    var vm = new Vue({
        el:'#app',
        data:{
            checkedRoles:[],
            username:null,
        },
        mounted:function(){
        },
        methods:{
            assinRole:function(){

            }
        }
    })
//}
</script>
@endsection