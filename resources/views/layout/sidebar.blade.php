<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Eric Guo</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if($controllerName == 'SalesController')
              <li class="treeview active">
        @else
              <li class="treeview">
        @endif
          <a href="#">
            <i class="fa  fa-line-chart"></i> <span>销量下降</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              @if($actionName == 'index')
                  <li class="active"><a href="/sales/decline"><i class="fa fa-circle-o text-red"></i> Index</a></li>
              @else
                  <li><a href="/sales/decline"><i class="fa fa-circle-o"></i> Index</a></li>
              @endif
          </ul>
        </li>
              @if($controllerName == 'RolesController')
                  <li class="treeview active">
              @else
                  <li class="treeview">
        @endif
                      <a href="#">
            <i class="fa  fa-users"></i> <span>权限控制</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              @if($actionName=='index')
                  <li class="active"><a href="/roles"><i class="fa fa-circle-o text-red"></i> Index</a></li>
              @else
                  <li><a href="/roles"><i class="fa fa-circle-o"></i> Index</a></li>
              @endif

              @if($actionName=='create')
                      <li class="active"><a href="/roles/create"><i class="fa fa-circle-o text-red"></i> Create</a></li>
              @else
                      <li><a href="/roles/create"><i class="fa fa-circle-o"></i> Create Action</a></li>
              @endif
          </ul>
        </li>
        <li><a onclick="alert('敬请期待哦')"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>