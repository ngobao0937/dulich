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
      <span class="brand-text font-weight-light">ADMIN WEBSITE</span>
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
              <i class="nav-icon fas fa-hotel"></i>
              <p>Khách sạn</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.room.index') }}" class="nav-link {{ request()->routeIs('backend.room.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bed"></i>
              <p>Phòng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.voucher.index') }}" class="nav-link {{ request()->routeIs('backend.voucher.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>Mã giảm giá</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.event.index') }}" class="nav-link {{ request()->routeIs('backend.event.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-week"></i>
              <p>Sự kiện</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.menu.index') }}" class="nav-link {{ request()->routeIs('backend.menu.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bars"></i>
              <p>Danh mục</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.extension.index') }}" class="nav-link {{ request()->routeIs('backend.extension.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-puzzle-piece"></i>
              <p>Tiện ích</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.banner.index') }}" class="nav-link {{ request()->routeIs('backend.banner.*') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>Banner</p>
            </a>
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
              <p>Đăng xuất</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>