<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="/admin" role="button"><i class="fas fa-bars"></i></a>
      </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin" class="brand-link">
      <img src="{{ asset('assets/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN ASIMAT</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">SIDEBAR</li>
          {{-- <li class="nav-item">
            <a href="{{ route('backend.dashboard.index') }}" class="nav-link {{ request()->routeIs('backend.dashboard.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('backend.product.index') }}" class="nav-link {{ request()->routeIs('backend.product.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-store"></i>
              <p>Sản phẩm</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.contact.index') }}" class="nav-link {{ request()->routeIs('backend.contact.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Liên hệ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.menu.index') }}" class="nav-link {{ request()->routeIs('backend.menu.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bars"></i>
              <p>Danh mục</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('backend.website.index') }}" class="nav-link {{ request()->routeIs('backend.website.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-link"></i>
              <p>Link Website</p>
            </a>
          </li> --}}
          <li class="nav-item {{ request()->routeIs('backend.banner.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('backend.banner.*') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Banner
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.banner.index', ['type'=>'main']) }}" class="nav-link {{ request()->routeIs('backend.banner.*') && request('type') == 'main' ? 'active' : '' }}">
                  <i class="far {{ request()->routeIs('backend.banner.*') && request('type') == 'main' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Chính</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.banner.index', ['type'=>'partner']) }}" class="nav-link {{ request()->routeIs('backend.banner.*') && request('type') == 'partner' ? 'active' : '' }}">
                  <i class="far {{ request()->routeIs('backend.banner.*') && request('type') == 'partner' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Đối tác</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.banner.index', ['type'=>'customer']) }}" class="nav-link {{ request()->routeIs('backend.banner.*') && request('type') == 'customer' ? 'active' : '' }}">
                  <i class="far {{ request()->routeIs('backend.banner.*') && request('type') == 'customer' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.page.index') }}" class="nav-link {{ request()->routeIs('backend.page.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Trang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.user.index') }}" class="nav-link {{ request()->routeIs('backend.user.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Thành viên</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-logout" class="nav-link"  style="color: rgb(250, 97, 97);">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Sign out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>