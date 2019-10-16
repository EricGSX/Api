@extends('layout.main')
@section('main-content')
    <style>
        .logoBar{
            background: red!important;
        }
    </style>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report
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
                        <iframe src="https://app.powerbi.com/view?r=eyJrIjoiNTlmYjFkNmUtYjNkZS00ZjU2LTg5MGEtNmM5OTEwMDM1MjAzIiwidCI6IjdlNGFiZmYxLWU3MjEtNGZhZC04MTdlLTZjZDI0NmIyNzgxNSIsImMiOjZ9" width="100%" height="400">
                            <p>您的浏览器不支持  iframe 标签,清选择其他浏览器访问。</p>
                        </iframe>
              <p style="height:1px;position:relative;bottom: 45px;"><b><img src="{{asset('img/shade.jpeg')}}"></b></p>
          </div>
        </section>
       <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
                    <iframe src="https://app.powerbi.com/view?r=eyJrIjoiMWZkOGMzNjEtMmE3OS00NGI4LWIyYTMtMDc3ZjA1N2Y2NGIxIiwidCI6IjdlNGFiZmYxLWU3MjEtNGZhZC04MTdlLTZjZDI0NmIyNzgxNSIsImMiOjZ9"  width="100%" height="400">
                    <p>您的浏览器不支持  iframe 标签,清选择其他浏览器访问。</p>
                    </iframe>
              <p style="height:1px;position:relative;bottom: 45px;"><b><img src="{{asset('img/shade.jpeg')}}"></b></p>
          </div>
        </section>
       <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
                    <iframe src="https://app.powerbi.com/view?r=eyJrIjoiYjQ2ZTIwMzctMmMzNi00MGVmLWJkZmUtNTFhNTg2NTljNGEzIiwidCI6IjdlNGFiZmYxLWU3MjEtNGZhZC04MTdlLTZjZDI0NmIyNzgxNSIsImMiOjZ9"  width="100%" height="400">
                    <p>您的浏览器不支持  iframe 标签,清选择其他浏览器访问。</p>
                    </iframe>
              <p style="height:1px;position:relative;bottom: 45px;"><b><img src="{{asset('img/shade.jpeg')}}"></b></p>
          </div>
        </section>
       <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
                    <iframe src="https://app.powerbi.com/view?r=eyJrIjoiMzMxOGY5ZjAtZDBmOS00NjQyLWFiNzYtMTYwMDU3NDFlOWY0IiwidCI6IjdlNGFiZmYxLWU3MjEtNGZhZC04MTdlLTZjZDI0NmIyNzgxNSIsImMiOjZ9"  width="100%" height="400">
                    <p>您的浏览器不支持  iframe 标签,清选择其他浏览器访问。</p>
                    </iframe>
              <p style="height:1px;position:relative;bottom: 45px;"><b><img src="{{asset('img/shade.jpeg')}}"></b></p>
          </div>
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection