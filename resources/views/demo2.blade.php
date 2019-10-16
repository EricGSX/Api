@extends('layout.main')
@section('main-content')
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
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
       <div class="row">
        <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
                    123123123
          </div>
        </section>


           <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
                    123123123
          </div>
        </section>           <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
                    123123123
          </div>
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>
    <script>
    new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue.js!',
            username:null,
            username2:null,
        }
    })
</script>
@endsection