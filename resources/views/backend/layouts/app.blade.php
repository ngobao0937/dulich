<!DOCTYPE html>
<html lang="vi">
<head>
    @include('backend.layouts.head')
    @yield('styles')
</head>
<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('backend.layouts.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('backend.layouts.footer')
    </div>
    @include('backend.layouts.modal')
    @include('backend.layouts.script')
    @yield('scripts')
</body>
</html>
