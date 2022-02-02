  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ \URL::to('/')}}" class="brand-link pl-3">
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
              @if (session('online_instructor')->profile_pic)
                <img src="{{ \URL::to('storage/app').'/'.session('online_instructor')->profile_pic }}" class="img-circle elevation-2">
              @else
                <img src="{{ \URL::to('public/assets').'/images/profile_pic.png' }}" class="img-circle elevation-2">
              @endif
            </div>
            <div class="info">
              <a href="#" class="d-block">{{session('online_instructor')->username}}</a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <li class="nav-item">

                      <a href="{{url('/instructor')}}"
                          class="nav-link {{(request()->is('instructor')) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;
                          <p>
                              Dashboard
                          </p>
                      </a>

                  </li>
                  <li class="nav-item">

                      <a href="{{url('instructor/courses')}}"
                          class="nav-link {{(request()->is('instructor/courses*')) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-align-justify"></i>&nbsp;
                          <p>
                              Courses
                          </p>
                      </a>

                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
