
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
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

<link rel="stylesheet" href="{{ auto_version('assets/frontend/lib/bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ auto_version('assets/frontend/lib/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ auto_version('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ auto_version('assets/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@yield('styles')
<link rel="stylesheet" href="{{ auto_version('assets/frontend/css/css.css') }}">

{{-- <link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/light.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/solid.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/brands.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/regular.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/duotone.min.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/animate.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/animate_text.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/fontawesome.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ auto_version('assets/frontend/css/reset_css.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,700|Montserrat:300,700|Montserrat:300,700|Montserrat:300,700|Roboto Slab:300,700|Montserrat:300,700|Montserrat:300,700|Montserrat:300,700|Tinos:300,700|Oswald:300,700|Sriracha|Paytone One:300,700|Lobster:300,700|Dancing Script:300,700|Play:300,700|Literata:300,700|Roboto:300,700|Roboto:300,700|Roboto:300,700|Roboto:300,700|Roboto:300,700|Roboto:300,700|Roboto:300,700|"> --}}
