@extends('layout.main')
@section('main-content')  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--<li class="active">Dashboard</li>--}}
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <section class="col-lg-7 connectedSortable">
          <div class="nav-tabs-custom">
              <p id="userinfo" class="Graph"></p>
          </div>
        </section>
        <section class="col-lg-5 connectedSortable">
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>
<script>
    $.get('/api/user',{},function(data){
        if(data.code == 200){
            var textContent = 'Welcome to Data Center';
        }else{
            var textContent = data.msg.name;
            alert(textContent);
            window.location.href = '/';
        }
        $('#userinfo').text(textContent)
    })
</script>
@endsection