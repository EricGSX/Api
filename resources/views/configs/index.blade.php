@extends('layout.main')
@section('main-content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Configs Cache List
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--<li class="active">Dashboard</li>--}}
      </ol>
    </section>
    <section class="content">
       <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="nav-tabs-custom">
              <div id='app' style="width: 100%;height: 100px;">
                  <p> &nbsp;</p>
                  <div class="col-md-2">
                      <button type="button" class="btn btn-warning" onclick="rolesCache()"><i class="fa fa-refresh"></i> Reresh Roles Lists Cache</button>
                  </div>
              </div>

          </div>
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>
    <script>
function rolesCache()
{
    $.get('/configs/roles',{},function(data){
        alert(data.msg);
    })
}
</script>
@endsection