<!DOCTYPE html>
<html lang="vi">
<head>
    @include('frontend.layout.head')
    
</head>
<body style="font-family: Roboto;">
    @include('frontend.layout.header')
    <div style="margin-top: 60px;">
        @yield('content')
    </div>
    @include('frontend.layout.footer')
    @include('frontend.layout.script')
    @yield('script')
</body>
</html>