<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light" style="background:#fff; border-bottom:2px solid #d4af37; box-shadow:0 4px 16px rgba(0,0,0,0.04);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color:#00008b;">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.home') }}" class="nav-link" style="color:#00008b; font-weight:bold; border-radius:16px;">
                Home
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button" style="color:#00008b;">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" style="border-radius:14px; border:1.5px solid #d4af37;">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit" style="background:#d4af37; color:#000; border-radius:14px;">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search" style="background:#dc3545; color:#fff; border-radius:14px;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="color:#00008b;">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->