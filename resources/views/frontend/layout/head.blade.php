<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('assets/frontend/images/logo.png') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="MSSmartTagsPreventParsing" content="true" />
<meta name="copyright" content="Copyright © 2025 Asimat" />
<meta name="author" content="Asimat">
<meta name="description" content="{{ $meta_description }}">
<meta name="keywords" content="{{ e($meta_keywords) }}">
<meta name="geo.region" content="VN-Hồ Chí Minh">
<meta property="og:title" content="{{ $meta_title }}">
<meta property="og:type" content="{{ $meta_og_type }}">
<meta property="og:description" content="{{ $meta_description }}">
<meta property="og:image" content="{{ $meta_og_image }}">
<meta property="og:url" content="{{ $meta_og_url }}">
<meta property="og:site_name" content="">
<meta property="og:image:width" content="400">
<meta property="og:image:height" content="400">
<meta name="robots" content="INDEX, FOLLOW" />
<meta name="RATING" content="GENERAL" />
<meta property="al:web:should_fallback" content="true">
<link rel="stylesheet" href="{{ asset('assets/frontend/lib/bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/lib/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
<link href="{{ asset('assets/frontend/css/master.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/frontend/css/ddsmoothmenu-v.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/frontend/css/jquery.nivo.slider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/frontend/css/highslide.css') }}" rel="stylesheet" type="text/css" >

{{-- <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('assets/frontend/js/jcarousellite.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.nivo.slider.js') }}"></script> --}}

{{-- <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery-1.3.2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/jCarousellite.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.nivo.slider.js') }}"></script> --}}
{{-- <script type="text/javascript" src="https://minhlaphose.com/templates/default/js/ddsmoothmenu.js"></script> --}}
{{-- <script type="text/javascript" src="https://minhlaphose.com/js/commons.js"></script> --}}
<script type="text/javascript" src="{{ asset('assets/frontend/js/highslide-with-html.js') }}"></script>
{{-- <script type="text/javascript">
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu2", //menu DIV id
        orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
        classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
        //customtheme: ["#1c5a80", "#18374a"],
        contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
    });
</script> --}}
<style>
    .mainBanner {
        position: relative;
        width: 100%;
    }
    .bannerSwiper .swiper-slide img{
        width: 100%;
        object-fit: cover;
    }
    .bannerSwiper .swiper-pagination {
        position: absolute;
        bottom: 15px !important;
        right: 15px !important;
        width: auto !important;
        left: auto !important;
        margin: 0;
    }
    .bannerSwiper .swiper-pagination-bullet {
        padding: 5px 7px;
        border-radius: 0;
        width: auto;
        height: auto;
        text-align: center;
        font-size: 12px;
        color:#000;
        opacity: 1;
        background: white;
        font-weight: bold;
    }
    .bannerSwiper .swiper-pagination-bullet-active {
        color:#fff;
        background: #003772;
        font-weight: bold;
    }

    .footerLogoList .swiper-slide {
        width: auto; /* để auto tính theo ảnh */
        text-align: center;
    }
    .li_scrollImg {
        width: 100px; 
        height: 70px;
        object-fit: cover;
        display: block;
        margin: 0 auto;
    }
    .leftMenu a {
        display: block;
        white-space: normal;
        word-break: break-word;
    }

    .product-container{
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 10px;
    }
    .product-item {
        position: relative;
        display: inline-block;
        width: 140px;
        height: 150px;
        text-align: center;
    }
    .product-item a{
        width: 100%;
        height: 100%;
        text-decoration: none;
    }
    .product-item a img{
        display: block;
        width: 100%;
        height: 130px;
        object-fit: contain;
        border: 1px solid #cecece;
        margin-bottom: 5px;
        padding: 10px;
    }
    .product-item a span{
        font-weight: bold;
        color: black;
    }

    /* Mỗi item */
    .page-item {
        margin: 0 2px;
    }

    /* Nút thường */
    .page-link {
        background: #e2e2e2;
        color: #000000;
        border: 1px solid #e2e2e2;
        border-radius: 0px;
        padding: 5px 10px;
        transition: background 0.3s;
    }

    .page-link:hover {
        background-color: #c9c9c9;
        text-decoration: none;
        color: black;
    }

    /* Nút đang active */
    .page-item.active .page-link {
        background-color: #0101f5;
        color: white;
        border-color: #0101f5;
    }

    /* Nút disabled */
    .page-item.disabled .page-link {
        color: #a3a3a3;
        pointer-events: none;
        background-color: #f5f5f5;
    }

    .sidebar{
        position: static;
        width: 270px !important;
        border-left:1px solid #d0d0d0;
	    border-right:1px solid #d0d0d0;
    }

    .main-content{
        width: 100%;
        border-left:1px solid #d0d0d0;
	    border-right:1px solid #d0d0d0;
    }

    footer{
        border-top:1px solid #d0d0d0;
    }

    /* Toggle button */
    .sidebar-toggle {
        display: none;
    }

    .btn-toggle {
        color: #fff;
        background-color: #0101f5;
        border-color: #0101f5;
    }

    .btn-toggle:hover {
        color: #fff;
        background-color: #0000bb;
        border-color: #0000bb;
    }

    .main-menu{
        font: bold 14px Tahoma, Geneva, sans-serif;
    }

    .row{
        margin-left: 0 !important;
        margin-right: 0 !important;
        padding-right: 0 !important;
        padding-left: 0 !important;
    }
    .searchLable{
        color: inherit !important;
    }
    .headerSearch{
        margin-top: 15px !important;
    }
    @media (max-width: 600px) {
        .searchLable{
            color: #000 !important;
        }
        .headerSearch{
            margin-top: 55px !important;
        }
    }
    @media (max-width: 768px) {
        .menu-left{
            display: block;
        }
        .menu-top{
            display: none;
        }
        .searchLable{
            color: #000;
        }
    }
    @media (min-width: 768px) {
        .menu-left{
            display: none;
        }
        .menu-top{
            display: block;
        }
    }
    @media (max-width: 992px) {
        /* Sidebar base */
        .sidebar {
            position: fixed;
            top: 0;
            left: -270px;
            width: 270px;
            height: 100vh;
            background-color: #ffffff;
            color: #fff;
            overflow-y: auto;
            transition: left 0.3s ease;
            z-index: 1000;
            scrollbar-width: none; 
            -ms-overflow-style: none;   
        }

        .sidebar::-webkit-scrollbar {
            display: none;
        }

        /* Sidebar visible */
        .sidebar.show {
            left: 0;
        }

        /* Main content shifts when sidebar is open (optional) */
        .main-content {
            transition: margin-left 0.3s ease;
            margin-left: 0;
        }

        .sidebar.show + .main-content {
            margin-left: 270px;
        }

        .sidebar-toggle {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            transition: left 0.3s ease;
            display: block; /* Ẩn mặc định */
        }

        
        .sidebar.show + .main-content {
            margin-left: 0;
        }

        .sidebar.show ~ .sidebar-toggle {
            left: 285px; /* 270px sidebar + khoảng cách 15px */
        }

        .main-content{
            padding-left: 0px;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* mờ */
            z-index: 999;
        }

        .sidebar.show + .sidebar-toggle + .main-content + .sidebar-overlay {
            display: block;
        }

        .container-main{
            padding-left: 0 !important;
            padding-right: 0 !important;
            max-width: 100% !important;
        }
    }
</style>