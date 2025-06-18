<!-- Main Sidebar Container -->
 <aside class="main-sidebar" style="background: #fff; border-right: 2.5px solid #d4af37; min-height:100vh;">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/logo.png')}}" class="img-circle elevation-2" alt="User Image" style="border:2px solid #d4af37; background:#fff; padding:2px;">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="color:#00008b; font-weight:bold;">{{ Str::ucfirst(Auth::user()->role) }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline mb-3">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="border-radius:16px; border:1.5px solid #d4af37;">
          <div class="input-group-append">
            <button class="btn btn-sidebar" style="background:#d4af37; color:#000; border-radius:16px;">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('room.index')}}" class="nav-link" style="color:#00008b; font-weight:600; border-radius:16px; margin-bottom:4px;">
                <i class="fas fa-bed nav-icon" style="color:#d4af37;"></i>
                <p>Room</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('roomtype.index')}}" class="nav-link" style="color:#00008b; font-weight:600; border-radius:16px; margin-bottom:4px;">
                <i class="fas fa-th-large nav-icon" style="color:#d4af37;"></i>
                <p>Room Types</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('roomfacility.index')}}" class="nav-link" style="color:#00008b; font-weight:600; border-radius:16px; margin-bottom:4px;">
                <i class="fas fa-couch nav-icon" style="color:#d4af37;"></i>
                <p>Room Facility</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('hotelfacility.index')}}" class="nav-link" style="color:#00008b; font-weight:600; border-radius:16px; margin-bottom:4px;">
                <i class="fas fa-swimming-pool nav-icon" style="color:#d4af37;"></i>
                <p>Hotel Facility</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.logs' )}}" class="nav-link" style="color:#00008b; font-weight:600; border-radius:16px; margin-bottom:4px;">
                <i class="fas fa-clipboard-list nav-icon" style="color:#d4af37;"></i>
                <p>Logs</p>
            </a>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
            style="color:#dc3545; font-weight:600; border-radius:16px;">
               <i class="fas fa-sign-out-alt nav-icon" style="color:#dc3545;"></i>
                <p>
                   {{ __('Logout') }}
                </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>