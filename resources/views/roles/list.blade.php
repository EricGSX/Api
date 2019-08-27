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
              <p><b></b></p>
                  <div id="roleLists">
                      @foreach ($allModules as $module)
                          <ul class="list-group">
                          <li class="list-group-item list-group-item-success">{{$module->display_name}}</li>
                          <li class="list-group-item ">
                              @foreach($allActions as $key=>$action)
                                  @if($key == $module->display_name)
                                      @foreach($action as $ac)
                                          @if($ac['action_name'] != null)
                                          <label class="checkbox-inline">
                                              {{$ac['action_display_name']}}({{$ac['modules_name']}}-{{$ac['action_name']}})
                                          </label>
                                          @endif
                                      @endforeach
                                  @endif
                              @endforeach
                          </li>
                        </ul>
                      @endforeach
                  </div>
          </div>
        </section>

      </div>
    </section>
    <!-- /.content -->
  </div>
    <script>
//window.onload=function(){
//var cache = [];
//var vm = new Vue({
//    el:'#app',
//    data:{
//        checkedRoles:[],
//        username:null,
//        roles:[],
//    },
//    mounted:function(){
//    },
//    methods:{
//        assinRole:function(){
//
//        }
//    }
//})
//}
</script>
@endsection