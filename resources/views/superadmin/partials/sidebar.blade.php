  
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('superadmin.dashboard') }}" class="brand-link">
      <img src="{{ asset('public/admin/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image"
           style="opacity: .8;margin-bottom:15px !important;">
      <span class="brand-text font-weight-light">bdCalling IT Ltd</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('public/admin/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
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
            <a href="{{ route('superadmin.dashboard') }}" class="nav-link {{ ($route == 'superadmin.dashboard') ? 'active' : '' }}">
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
                <a href="{{ route('department.view') }}" class="nav-link {{ ($route == 'department.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('designation.view') }}" class="nav-link {{ ($route == 'designation.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('team.view') }}" class="nav-link {{ ($route == 'team.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('grade.view') }}" class="nav-link {{ ($route == 'grade.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account.view') }}" class="nav-link {{ ($route == 'account.view') ? 'active' : '' }}">
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
                <a href="{{ route('employee.add') }}" class="nav-link {{ ($route == 'employee.add') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('employee.view') }}" class="nav-link {{ ($route == 'employee.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('adminList.view') }}" class="nav-link {{ ($route == 'adminList.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamsalesList.view') }}" class="nav-link {{ ($route == 'kamsalesList.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KAM Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamoperationList.view') }}" class="nav-link {{ ($route == 'kamoperationList.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KAM Operation</p>
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