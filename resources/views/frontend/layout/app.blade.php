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
    
    @yield('script')
</body>
</html>