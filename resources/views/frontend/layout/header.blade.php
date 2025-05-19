<header class="w-100 transparent-header">
    <nav class="navbar navbar-expand-lg navbar-dark d-flex justify-content-between align-items-center padding-header">
        <button class="navbar-toggler" type="button" id="sidebarToggle" style="z-index: 10">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex w-100 justify-content-between">
            <a class="navbar-brands font-weight-bold text-primary title-web a-icon" href="/" style="z-index: 2">
                <img class="logo-web" src="{{ asset('images/logo-1.png') }}" alt="Logo">
                <span class="title-sodl ml-2" style="color: white;">Du lịch Bà Rịa - Vũng Tàu</span>
            </a>

            <a href="javascript:void(0)" class="btn pl-3 pr-3 register-header" data-toggle="modal" data-target="#myModal" style="background: white; border-radius: 20px; z-index: 2;"><b style="color: rgb(28, 77, 114);">ĐĂNG KÝ</b></a>
        </div>

        <ul class="navbar-nav align-items-center d-none d-lg-flex justify-content-center" style="position: absolute; top: 15px; width: 100%; left: 0">
            <li class="nav-item mr-4">
                <a class="nav-link text-white {{ Route::is('frontend.home.index') ? 'active' : '' }}" href="/" style="font-weight: bold;">TRANG CHỦ</a>
            </li>
            <li class="nav-item mr-4">
                <a class="nav-link text-white {{ Route::is('frontend.home.event') ? 'active' : '' }}" href="{{ route('frontend.home.event') }}" style="font-weight: bold;">SỰ KIỆN DU LỊCH</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::is('frontend.product.promotions') ? 'active' : '' }}" href="{{ route('frontend.product.promotions') }}" style="font-weight: bold;">KHUYẾN MÃI & ƯU ĐÃI</a>
            </li>
        </ul>
    </nav>
</header>
<div id="mobileSidebar" class="mobile-sidebar">
    <div class="sidebar-content">
        <button id="sidebarClose" class="close-btn">&times;</button>
        <ul class="list-unstyled mt-4">
            <li><a class="text-white d-block py-2" href="/" style="font-weight: bold;">TRANG CHỦ</a></li>
            <li><a class="text-white d-block py-2" href="{{ route('frontend.home.event') }}" style="font-weight: bold;">SỰ KIỆN DU LỊCH</a></li>
            <li><a class="text-white d-block py-2" href="{{ route('frontend.product.promotions') }}" style="font-weight: bold;">KHUYẾN MÃI & ƯU ĐÃI</a></li>
            <li><a class="btn pl-3 pr-3 mt-3" data-toggle="modal" data-target="#myModal" style="background: white; border-radius: 20px;"><b style="color: rgb(28, 77, 114);">ĐĂNG KÝ</b></a></li>
        </ul>
    </div>
</div>

<div class="overlay-sidebar" id="sidebarOverlay"></div>
