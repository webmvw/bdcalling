  
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('kamoperation.dashboard') }}" class="brand-link">
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
            <a href="{{ route('kamoperation.dashboard') }}" class="nav-link {{ ($route == 'kamoperation.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Profile</p>
            </a>
          </li>

          <li class="nav-item {{ ($prefix == '/kamoperation.order_manage') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Order Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kamoperation.order.view') }}" class="nav-link {{ ($route == 'kamoperation.order.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamoperation.order.wipview') }}" class="nav-link {{ ($route == 'kamoperation.order.wipview') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>WIP Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamoperation.order.completeview') }}" class="nav-link {{ ($route == 'kamoperation.order.completeview') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Complete Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamoperation.order.cancelledview') }}" class="nav-link {{ ($route == 'kamoperation.order.cancelledview') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cancelled Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamoperation.order.issuesview') }}" class="nav-link {{ ($route == 'kamoperation.order.issuesview') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issues Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamoperation.order.revisionview') }}" class="nav-link {{ ($route == 'kamoperation.order.revisionview') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rivision Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamoperation.order.neview') }}" class="nav-link {{ ($route == 'kamoperation.order.neview') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>NE Order List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kamoperation.delivery.view') }}" class="nav-link {{ ($route == 'kamoperation.delivery.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delivery Order List</p>
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