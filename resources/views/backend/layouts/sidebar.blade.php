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
      
      <nav class="mt-2 pb-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- <li class="nav-header">SIDEBAR</li> --}}
          {{-- <li class="nav-item">
            <a href="{{ route('backend.dashboard.index') }}" class="nav-link {{ request()->routeIs('backend.dashboard.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li> --}}
          @if (Auth::user()->role->id == 2)
            <li class="nav-item">
              <a href="{{ route('backend.product.my.product') }}" class="nav-link {{ request()->routeIs('backend.product.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-hotel"></i>
                <p>Khách sạn của bạn</p>
              </a>
            </li>
          @endif

          @if ((Auth::user()->hasPermission(12) && Auth::user()->role->id != 2) || Auth::user()->hasPermission(17))     
          <li class="nav-item {{ (request()->routeIs('backend.product.*') || request()->routeIs('backend.receipt.*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->routeIs('backend.product.*') || request()->routeIs('backend.receipt.*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Quản lý khách sạn
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasPermission(12) && Auth::user()->role->id != 2)
                <li class="nav-item">
                  <a href="{{ route('backend.product.index') }}" class="nav-link {{ request()->routeIs('backend.product.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.product.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Khách sạn</p>
                  </a>
                </li>
              @endif

              @if (Auth::user()->hasPermission(17))
                <li class="nav-item">
                  <a href="{{ route('backend.receipt.index') }}" class="nav-link {{ request()->routeIs('backend.receipt.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.receipt.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Phiếu thu</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
          @endif

          
          
          {{-- <li class="nav-item">
            <a href="{{ route('backend.room.index') }}" class="nav-link {{ request()->routeIs('backend.room.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bed"></i>
              <p>Phòng</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ route('backend.voucher.index') }}" class="nav-link {{ request()->routeIs('backend.voucher.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>Mã giảm giá</p>
            </a>
          </li> --}}
          
          
          
          
          
          {{-- <li class="nav-item">
            <a href="{{ route('backend.extension.index') }}" class="nav-link {{ request()->routeIs('backend.extension.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-puzzle-piece"></i>
              <p>Tiện ích</p>
            </a>
          </li> --}}
          
          
          
          
          {{-- <li class="nav-item">
            <a href="{{ route('backend.menu.index') }}" class="nav-link {{ request()->routeIs('backend.menu.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bars"></i>
              <p>Danh mục</p>
            </a>
          </li> --}}

          

          @if (Auth::user()->hasPermission(5) || Auth::user()->hasPermission(9) || Auth::user()->hasPermission(10) || Auth::user()->hasPermission(11) || Auth::user()->isSuperUser() || Auth::user()->hasPermission(6) || Auth::user()->hasPermission(4))
          <li class="nav-item {{ (request()->routeIs('backend.promotion_public.*') || request()->routeIs('backend.banner.*') || request()->routeIs('backend.sponsor.*') || request()->routeIs('backend.page.*') || request()->routeIs('backend.other.*') || request()->routeIs('backend.event.*') || request()->routeIs('backend.blog.*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->routeIs('backend.promotion_public.*') || request()->routeIs('backend.banner.*') || request()->routeIs('backend.sponsor.*') || request()->routeIs('backend.page.*') || request()->routeIs('backend.other.*') || request()->routeIs('backend.event.*') || request()->routeIs('backend.blog.*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-palette"></i>
              <p>
                Quản lý giao diện
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasPermission(4))
                <li class="nav-item">
                  <a href="{{ route('backend.event.index') }}" class="nav-link {{ request()->routeIs('backend.event.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.event.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Sự kiện</p>
                  </a>
                </li>
              @endif
              
              
              
              @if (Auth::user()->hasPermission(6))
                <li class="nav-item">
                  <a href="{{ route('backend.blog.index') }}" class="nav-link {{ request()->routeIs('backend.blog.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.blog.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Blog</p>
                  </a>
                </li>
              @endif
              @if (Auth::user()->hasPermission(5))
                <li class="nav-item">
                  <a href="{{ route('backend.promotion_public.index') }}" class="nav-link {{ request()->routeIs('backend.promotion_public.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.promotion_public.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Ưu đãi</p>
                  </a>
                </li>
              @endif

              @if (Auth::user()->hasPermission(9))
                <li class="nav-item">
                  <a href="{{ route('backend.banner.index') }}" class="nav-link {{ request()->routeIs('backend.banner.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.banner.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Banner</p>
                  </a>
                </li>
              @endif
              
              @if (Auth::user()->hasPermission(10))
                <li class="nav-item">
                  <a href="{{ route('backend.sponsor.index') }}" class="nav-link {{ request()->routeIs('backend.sponsor.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.sponsor.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Nhà tài trợ</p>
                  </a>
                </li>
              @endif
              @if (Auth::user()->hasPermission(11))
                <li class="nav-item">
                  <a href="{{ route('backend.page.index') }}" class="nav-link {{ request()->routeIs('backend.page.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.page.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Trang</p>
                  </a>
                </li>
              @endif
              @if (Auth::user()->isSuperUser())
                <li class="nav-item">
                  <a href="{{ route('backend.other.index') }}" class="nav-link {{ request()->routeIs('backend.other.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.other.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Khác</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
          @endif

          @if (Auth::user()->hasPermission(7) || Auth::user()->hasPermission(8))      
          <li class="nav-item {{ (request()->routeIs('backend.comment.*') || request()->routeIs('backend.customer.*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->routeIs('backend.comment.*') || request()->routeIs('backend.customer.*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý khách hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasPermission(7))
                <li class="nav-item">
                  <a href="{{ route('backend.comment.index') }}" class="nav-link {{ request()->routeIs('backend.comment.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.comment.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Phản hồi</p>
                  </a>
                </li>
              @endif
              
              @if (Auth::user()->hasPermission(8))
                <li class="nav-item">
                  <a href="{{ route('backend.customer.index') }}" class="nav-link {{ request()->routeIs('backend.customer.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.customer.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Người đăng ký</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
          @endif

          @if (Auth::user()->hasPermission(3) || Auth::user()->hasPermission(2))      
          <li class="nav-item {{ (request()->routeIs('backend.role.*') || request()->routeIs('backend.user.*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->routeIs('backend.role.*') || request()->routeIs('backend.user.*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Quản lý hệ thống
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasPermission(3))
                <li class="nav-item">
                  <a href="{{ route('backend.role.index') }}" class="nav-link {{ request()->routeIs('backend.role.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.role.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Quyền & Vai trò</p>
                  </a>
                </li>
              @endif
              
              @if (Auth::user()->hasPermission(2))
                <li class="nav-item">
                  <a href="{{ route('backend.user.index') }}" class="nav-link {{ request()->routeIs('backend.user.*') ? 'active' : '' }}">
                    <i class="far {{ request()->routeIs('backend.user.*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Thành viên</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
          @endif

          <div class="user-panel pt-3 pb-3 mb-3 mt-3 d-flex" style="border-top: 1px solid #4f5962;">
            <div class="image">
              <img src="{{ Auth::user()->image ? asset('uploads/'.Auth::user()->image->ten) : asset('images/default.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="javascript:void(0)" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>

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