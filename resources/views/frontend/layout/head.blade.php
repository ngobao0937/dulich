<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
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
<script type="text/javascript" src="{{ asset('assets/frontend/js/highslide-with-html.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">