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
        <section class="col-lg-12 connectedSortable">
          <div class="nav-tabs-custom">
              <p id="userinfo" class="Graph">123</p>
              <div id='app'>
	<select class="selectpicker" data-live-search="true" v-model="username" style="width: 70%;" >
  <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
  <option data-tokens="mustard">Burger, Shake and a Smile</option>
  <option data-tokens="frosting">Sugar, Spice and all things nice</option>
</select>



</div>
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