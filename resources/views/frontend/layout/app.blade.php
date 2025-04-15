<!DOCTYPE html>
<html lang="vi">
<head>
    @include('frontend.layout.head')
    @yield('styles')
</head>
<body>
    <div class="container container-main">
        @include('frontend.layout.header')
        <div class="widthContent">
            <div class="bodyBg d-flex">
                <div id="sidebar" class="sidebar">
                    @include('frontend.layout.sidebar')
                </div>
                <a id="toggleSidebar" class="sidebar-toggle nav-link btn btn-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <div id="mainContent" class="main-content pb-4">
                    @yield('content')
                </div>

                <div id="sidebarOverlay" class="sidebar-overlay"></div>
            </div>
        </div>
        @include('frontend.layout.footer')
    </div>
    <button id="scrollToTop" style="display: none; position: fixed; bottom: 30px; right: 30px; z-index: 100; height: 40px; width: 40px; border-radius: 50%; background: #54546d;" type="button" class="btn btn-lg">
        <i class="fas fa-chevron-up" style="font-size: 17px; color: white;"></i>
    </button>
    @yield('script')
</body>
</html>