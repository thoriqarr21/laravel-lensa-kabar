<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('images/'.auth()->user()->photo) }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth()->user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="header" style="background-color: rgb(169, 169, 169); color: white">MAIN NAVIGATION</li>
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
          <a href="{{ url('/dashboard') }}">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
          </a>
      </li>
      <li class="{{ Request::is('admin/news*') ? 'active' : '' }}">
        <a href="{{ route('admin.news.index') }}">
            <i class="fa fa-th"></i>
            <span>News</span>
        </a>
    </li>
    @can('admin')
      <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
          <a href="{{ route('admin.category.index') }}">
              <i class="fa fa-th"></i>
              <span>Category</span>
          </a>
      </li>
      <li class="header" style="background-color: rgb(169, 169, 169); color: white">LABELS</li>
      <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
          <a href="{{ route('admin.users.index') }}">
              <i class="fa fa-users"></i>
              <span>Users</span>
          </a>
      </li>
      

      <li class="treeview">
        <a href="{{ route('admin.settings.index') }}">
          <i class="fa fa-gear text-red"></i> 
          <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.settings.index') }}"><i class="fa fa-circle-o"></i> Genarel Setting</a></li>
          <li><a href="{{ route('admin.advertisements.index') }}"><i class="fa fa-circle-o"></i> Advertisement Setting</a></li>
          <li><a href="{{ route('admin.settings.breakingnews') }}"><i class="fa fa-circle-o"></i> Breaking News Setting</a></li>
        </ul>
      </li>
      @endcan
    </ul>
    
  </section>

</aside>
