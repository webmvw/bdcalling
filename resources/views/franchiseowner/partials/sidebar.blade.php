  
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('franchiseowner.dashboard') }}" class="brand-link">
      <img src="{{ asset('public/admin/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image"
           style="opacity: .8;margin-bottom:15px !important;">
      <span class="brand-text font-weight-light">BDCalling It Ltd</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->image == null)
          <img src="{{ asset('public/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{ asset('public/img/employee/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('franchiseowner.dashboard') }}" class="nav-link {{ ($route == 'user.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item {{ ($prefix == '/setups') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setups Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('franchiseowner.department.view') }}" class="nav-link {{ ($route == 'franchiseowner.department.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('franchiseowner.designation.view') }}" class="nav-link {{ ($route == 'franchiseowner.designation.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('franchiseowner.grade.view') }}" class="nav-link {{ ($route == 'franchiseowner.grade.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('franchiseowner.team.view') }}" class="nav-link {{ ($route == 'franchiseowner.team.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('franchiseowner.account.view') }}" class="nav-link {{ ($route == 'franchiseowner.account.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix == '/employee_manage') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Employee Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('franchiseowner.employee.view') }}" class="nav-link {{ ($route == 'franchiseowner.employee.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Employee</p>
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