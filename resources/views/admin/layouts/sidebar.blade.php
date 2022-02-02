  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ URL::to('/')}}" class="brand-link">
        @if ( $global_settings->site_logo )
            <img src="{{ URL::to('storage/app').'/'.$global_settings->site_logo }}" alt=" " class="brand-image img-circle elevation-3">
        @endif          
        <span class="brand-text font-weight-bold">{{ $global_settings->site_name }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  @if (session('online_admin')->profile_pic)
                  <img src="{{ URL::to('storage/app').'/'.session('online_admin')->profile_pic }}"
                      class="img-circle elevation-2">
                  @else
                  <img src="{{ URL::to('public/assets').'/images/profile_pic.png' }}" class="img-circle elevation-2">
                  @endif
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{session('online_admin')->username}}</a>
              </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="{{url('/admin')}}" class="nav-link {{(request()->is('admin') ) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;
                          <p>Dashboard</p>
                      </a>
                  </li>
                  {{-- custom Links --}}
                  <li class="nav-item">
                      <a href="{{url('/admin/user_management')}}"
                          class="nav-link {{(request()->is('admin/user_management') || request()->is('admin/user_management/create') || request()->is('admin/user_management/edit*')) ? 'active' : '' }}">
                          <i class="fas fa-users nav-icon"></i> &nbsp;
                          <p>User Management</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/admin/instructors')}}"
                          class="nav-link {{(request()->is('admin/instructors') || request()->is('admin/instructors/create') || request()->is('admin/instructors/edit*')) ? 'active' : '' }}">
                          <i class="fas fa-users nav-icon"></i> &nbsp;
                          <p>Instructors</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/admin/courses')}}"
                          class="nav-link {{(request()->is('admin/courses*')) ? 'active' : '' }}">
                          <i class="fas fa-align-justify nav-icon"></i> &nbsp;
                          <p>Courses</p>
                      </a>
                  </li>
                  <li class="nav-item {{(request()->is('admin/system_settings*')) ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{(request()->is('admin/system_settings*')) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-cogs"></i>
                          <p>
                              System Settings
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('/admin/system_settings/global_settings')}}" class="nav-link {{(request()->is('admin/system_settings/global_settings')) ? 'active' : '' }}">
                                  <i class="fas fa-wrench nav-icon"></i>
                                  <p>Global Settings</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
