
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('owner.dashboard') }}" class="brand-link">
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
            <a href="{{ route('owner.dashboard') }}" class="nav-link {{ ($route == 'owner.dashboard') ? 'active' : '' }}">
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
                <a href="{{ route('owner.franchise.view') }}" class="nav-link {{ ($route == 'owner.franchise.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Franchise</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('owner.department.view') }}" class="nav-link {{ ($route == 'owner.department.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('owner.designation.view') }}" class="nav-link {{ ($route == 'owner.designation.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('owner.team.view') }}" class="nav-link {{ ($route == 'owner.team.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('owner.grade.view') }}" class="nav-link {{ ($route == 'owner.grade.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('owner.account.view') }}" class="nav-link {{ ($route == 'owner.account.view') ? 'active' : '' }}">
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
                <a href="{{ route('owner.employee.add') }}" class="nav-link {{ ($route == 'owner.employee.add') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('owner.employee.view') }}" class="nav-link {{ ($route == 'owner.employee.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('owner.franchiseOwner.view') }}" class="nav-link {{ ($route == 'owner.franchiseOwner.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Franchise Owner</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item {{ ($prefix == '/allorder_manage') ? 'menu-is-opening menu-open': '' }}">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                      Order & Delivery
                      <i class="fas fa-angle-left right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{ route('owner.allorder.view') }}" class="nav-link {{ ($route == 'owner.allorder.view') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Order List</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('owner.delivery.view') }}" class="nav-link {{ ($route == 'owner.delivery.view') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Delivery  List</p>
                      </a>
                  </li>
              </ul>
          </li>




          <li class="nav-item {{ ($prefix == '/order_report') ? 'menu-is-opening menu-open': '' }}">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                      Order Report
                      <i class="fas fa-angle-left right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('owner.allOrderReport') }}" class="nav-link {{ ($route == 'owner.allOrderReport' or $route == 'owner.allOrderReportRequest') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('owner.franchiseWiseOrderReport') }}" class="nav-link {{ ($route == 'owner.franchiseWiseOrderReport' or $route == 'owner.franchiseWiseOrderReportRequest') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Franchise Wise</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('owner.departmentwiseOrderReport') }}" class="nav-link {{ ($route == 'owner.departmentwiseOrderReport' or $route == 'owner.departmentwiseOrderReportRequest') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Department Wise</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('owner.accountwiseOrderReport') }}" class="nav-link {{ ($route == 'owner.accountwiseOrderReport' or $route == 'owner.accountwiseOrderReportRequest') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Account Wise</p>
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
