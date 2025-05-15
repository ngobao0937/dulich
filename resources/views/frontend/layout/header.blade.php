{{-- <header class="w-100">
    <section class="w-100" id="SECTION31">
        <div class="sp_container">
            <div id="SHAPE78" open-popup="POPUP3" class="hide_item_desktop">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 18 18">
                    <foreignObject x="0" y="0" width="18" height="18">
                        <i class=" far  fa-ellipsis-h" style="font-size: 18px; color: rgb(28, 77, 114); cursor: pointer;"></i>
                    </foreignObject>
                </svg>
            </div>
            <div id="GROUP772">
                <div>
                    <div id="TITLE650">
                        <h3>Du lịch Bà Rịa - Vũng Tàu</h3>
                    </div>
                    <div class="hide_item_mobile" style="display: flex; font-size: 17px; gap: 30px; width: 100%; height: 100%; align-items: center; justify-content: flex-end; padding-right: 150px;">
                        <a href="/">
                            TRANG CHỦ
                        </a>
                        <a href="#">
                            SỰ KIỆN DU LỊCH
                        </a>
                        <a href="#">
                            KHUYẾN MÃI & ƯU ĐÃI
                        </a>
                    </div>
                    
                    <div id="BUTTON122">
                        <button type="button" data-funnel="yes"> 
                            <span> ĐĂNG KÝ</span> 
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</header> --}}

<header class="w-100">
    <nav class="navbar navbar-expand-lg navbar-dark d-flex justify-content-between align-items-center" style="background-color: rgb(28, 77, 114); color: white;">
        <button class="navbar-toggler" type="button" id="sidebarToggle" style="z-index: 10">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brands font-weight-bold text-primary title-web a-icon" href="/" style="z-index: 1">
            <img class="logo-web" src="{{ asset('images/logo-1.png') }}" alt="Logo">
            <span class="title-sodl ml-2" style="color: white;">Du lịch Bà Rịa - Vũng Tàu</span>
        </a>

        <ul class="navbar-nav align-items-center d-none d-lg-flex">
            <li class="nav-item">
                <a class="nav-link text-white" href="/" style="font-weight: bold;">TRANG CHỦ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" style="font-weight: bold;">SỰ KIỆN DU LỊCH</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('frontend.product.promotions') }}" style="font-weight: bold;">KHUYẾN MÃI & ƯU ĐÃI</a>
            </li>
            <li class="nav-item ml-lg-3">
                <a href="#" class="btn pl-3 pr-3" style="background: white; border-radius: 20px;"><b style="color: rgb(28, 77, 114);">ĐĂNG KÝ</b></a>
            </li>
        </ul>
    </nav>

    <div id="mobileSidebar" class="mobile-sidebar">
        <div class="sidebar-content">
            <button id="sidebarClose" class="close-btn">&times;</button>
            <ul class="list-unstyled mt-4">
                <li><a class="text-white d-block py-2" href="/" style="font-weight: bold;">TRANG CHỦ</a></li>
                <li><a class="text-white d-block py-2" href="#" style="font-weight: bold;">SỰ KIỆN DU LỊCH</a></li>
                <li><a class="text-white d-block py-2" href="{{ route('frontend.product.promotions') }}" style="font-weight: bold;">KHUYẾN MÃI & ƯU ĐÃI</a></li>
                <li><a class="btn pl-3 pr-3 mt-3" href="#" style="background: white; border-radius: 20px;"><b style="color: rgb(28, 77, 114);">ĐĂNG KÝ</b></a></li>
            </ul>
        </div>
    </div>

    <div class="overlay-sidebar" id="sidebarOverlay"></div>
</header>

