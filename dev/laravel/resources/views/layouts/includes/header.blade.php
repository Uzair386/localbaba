{{-- {{ Session::get('coupon_code')}} --}}
<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title', '{{$settings->site_name}}')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Start SEO Settings -->
  <meta name="description" content="@yield('description', '{{$settings->meta_name}}')">
  <meta name="author" content="{{$settings->site_name}}">
  <link rel="canonical" href="{{ url('/') }}" />
  <link rel="instagram" href="{{$settings->social_instagram}}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta name="keywords" content="{{$settings->keywords}}">
  <meta property="og:title" content="@yield('description', '{{$settings->meta_name}}')" />
  <meta property="og:description" content="@yield('description', '{{$settings->meta_name}}')" />
  <meta property="og:url" content="{{ url('/') }}" />
  <meta property="og:site_name" content="{{$settings->site_name}}" />
  <meta property="og:image" content="{{asset($settings->logo)}}" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="@yield('description', '{{$settings->meta_name}}')" />
  <meta name="twitter:title" content="@yield('title', '{{$settings->site_name}}')" />
  <meta name="twitter:site" content="{{$settings->social_twitter}}" />
  <meta name="twitter:image" content="{{asset($settings->logo)}}" />
  <meta name="twitter:creator" content="{{$settings->site_name}}" />
  <!-- End SEO Settings -->
  <link rel="apple-touch-icon" href="{{asset($settings->logo)}}">
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
  {!!Feed::link(url('feed'), 'atom', 'My Feed', 'en')!!}
  <!-- Place favicon.ico in the root directory -->

  <!-- =========================
        Loading All Stylesheet
    ============================== -->
  <link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css\font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css\owl.carousel.min.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('css\owl.carousel.min.css')}}"> -->

  <link rel="stylesheet" href="{{asset('css\owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css\animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('css\custom.css')}}">

  <link rel="stylesheet" href="{{asset('css\megamenu.css')}}">
  <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css')}}" rel="stylesheet">

  <!-- =========================
        Loding Main Theme Style
    ============================== -->
  <link rel="stylesheet" href="{{asset('css\style.css')}}">

  <!-- New Theme Styles -->

  <link rel="preload" href="/_next/static/css/2e73f0624ec988e9.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/2e73f0624ec988e9.css" data-n-g="" />
  <link rel="preload" href="/_next/static/css/6505ac208aedd4b9.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/6505ac208aedd4b9.css" data-n-p="" />
  <link rel="preload" href="/_next/static/css/4d208b01901de087.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/4d208b01901de087.css" data-n-p="" />
  <link rel="preload" href="/_next/static/css/906d9856c4e84d35.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/906d9856c4e84d35.css" data-n-p="" />
  <link rel="preload" href="/_next/static/css/4ba0d73d9e10018c.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/4ba0d73d9e10018c.css" data-n-p="" />
  <link rel="preload" href="/_next/static/css/594efecdb69c0aae.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/594efecdb69c0aae.css" data-n-p="" />
  <link rel="preload" href="/_next/static/css/8d4061b0f58a3d78.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/8d4061b0f58a3d78.css" data-n-p="" />
  <link rel="preload" href="/_next/static/css/b02dd705ab908728.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/b02dd705ab908728.css" data-n-p="" />
  <link rel="preload" href="/_next/static/css/cf4086cb4fa6f6f4.css" as="style" />
  <link rel="stylesheet" href="/_next/static/css/cf4086cb4fa6f6f4.css" data-n-p="" />
  <noscript data-n-css=""></noscript>
  <style>
    .wd-tab-section .wd-tab-menu .active {
      background: #ef7f4e !important;
    }
    .wd-tab-section .wd-tab-menu a:hover {
      background: #ef7f4e !important;
    }

    a {
      color: #ef7f4e;
    }
    a:hover {
      color: #ef704e !important;
    }
    .ant-btn-primary, .free-trial:hover,.active-color:hover {
      background: #ef7f4e !important;
      border-color: #ef7f4e !important;
      color: white !important;
    }
    .header-cart .count {
      background: #ef704e !important;
    }

    .header-cart .coupon-save:hover {
      color: #ef704e !important;
    }

    .dsc-user-info .bd-r>a:hover {
      color: #ef704e !important;
    }

    ::-moz-selection { /* Code for Firefox */
      color: white !important;
      background: #ef704e !important;
    }

    ::selection {
      color: white !important;
      background: #ef704e !important;
    }

    .ant-btn-primary:focus, .ant-btn-primary:hover,.sidebar-search .btn-secondary:hover {
      background: #ef704e !important;
      border-color: #ef704e !important;
    }
    .ant-input-affix-wrapper:not(.ant-input-affix-wrapper-disabled):hover {
      border-color: #ef704e !important;
    }
    .free-trial,.ant-btn:focus, .ant-btn:hover {
      color: #ef704e !important;
      border-color: #ef704e !important;
    }

    .ant-btn-primary:hover {
      color: white !important;
    }

    #register-intro-btn:hover {
      color: white !important;
    }

    .products-wrap a:hover {
      color: #ef704e !important;
    }
    .side-bar a:hover, .active-color , .category-bar .category-item.active, .category-bar .category-item:hover, .category-bar .category-more-item.active, .category-bar .category-more-item:hover,.category-bar .category-item.active>.category-title .cb-icon, .category-bar .category-item.active>.category-title a, .category-bar .category-item:hover>.category-title .cb-icon, .category-bar .category-item:hover>.category-title a, .category-bar .category-more-item.active>.category-title .cb-icon, .category-bar .category-more-item.active>.category-title a, .category-bar .category-more-item:hover>.category-title .cb-icon, .category-bar .category-more-item:hover>.category-title a {
      color: #ef704e !important;
    }
    .product-name span {
      width: 100%;
      font-size: 14px;
      line-height: 22px;
      display: block;
      color: #222;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
  </style>

  <!-- End New Theme Styles -->

  <!-- =========================
    	Header Loding JS Script
    ============================== -->
  <script src="{{asset('js/modernizr.js')}}"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

  <!-- New Theme Scripts -->
  <script defer="" nomodule="" src="/_next/static/chunks/polyfills-0d1b80a048d4787e.js"></script>
  <script src="/_next/static/chunks/webpack-a81663f080c20804.js" defer=""></script>
  <script src="/_next/static/chunks/framework-34ae0f2c4b5db51c.js" defer=""></script>
  <script src="/_next/static/chunks/main.js" defer=""></script>
  <script src="/_next/static/chunks/pages/_app-4f9a1f58eb94fe79.js" defer=""></script>
  <script src="/_next/static/chunks/7139-cda8d7f63cc0ee81.js" defer=""></script>
  <script src="/_next/static/chunks/4758-00225d10cfe1980e.js" defer=""></script>
  <script src="/_next/static/chunks/348-e08546f26fca0fb0.js" defer=""></script>
  <script src="/_next/static/chunks/2702-f19a167e36cf482a.js" defer=""></script>
  <script src="/_next/static/chunks/9280-c9ba3cda0c7f857e.js" defer=""></script>
  <script src="/_next/static/chunks/7142-6c8a56251d13bed3.js" defer=""></script>
  <script src="/_next/static/chunks/8441-09fabbe39ee839ec.js" defer=""></script>
  <script src="/_next/static/chunks/1216-4d75dce0c513c30f.js" defer=""></script>
  <script src="/_next/static/chunks/7637-da30b232beca6ad6.js" defer=""></script>
  <script src="/_next/static/chunks/2895-77d2a1b5fb02725f.js" defer=""></script>
  <script src="/_next/static/chunks/1522-ba434b4a00a691c7.js" defer=""></script>
  <script src="/_next/static/chunks/3106-cd2f4279a95165bc.js" defer=""></script>
  <script src="/_next/static/chunks/1841-a8e5a85d282eb648.js" defer=""></script>
  <script src="/_next/static/chunks/5031-ac77e36f1895fb89.js" defer=""></script>
  <script src="/_next/static/chunks/2849-fd89d9963fc40e8a.js" defer=""></script>
  <script src="/_next/static/chunks/pages/index-9bc02bf2397173f2.js" defer=""></script>
  <script src="/_next/static/1ed9f2c2f29f80fd936e620cdd6c8b51/_buildManifest.js" defer=""></script>
  <script src="/_next/static/1ed9f2c2f29f80fd936e620cdd6c8b51/_ssgManifest.js" defer=""></script>
  <!-- End New Theme Scripts -->

</head>

<body class="">
  <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div class="preloader"></div>

  <!-- =========================
        Header Top Section
    ============================== -->
  <div id="__next">
    <div class="visitor-layout layout-main-cnt">
      <div class="visitor-content ">
        <div class="top-banner-wrap"></div>
        <div class="screen-com-wrap"></div>
        @include('layouts.includes.menu')
  <!-- =========================
        Header Section
    ============================== -->