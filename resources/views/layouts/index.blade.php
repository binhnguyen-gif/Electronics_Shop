<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title', "Smart Store - Điện thoại, Laptop, Link kiện chính hãng")
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset("assets/images/cart2.png") }}">
    <link href="{{ asset("assets/css/bootstrap.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/font-awesome.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/lte.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{ asset("assets/css/owl.carousel.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/AdminLTE.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/style-jc.css") }}">
    <link href="{{ asset("assets/css/menu-tab.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/jquery.bxslider.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/flexslider.css") }}" rel="stylesheet">

    <script src="{{ asset("assets/js/jquery-2.2.3.min.js") }}"></script>
</head>
<body>
<div class='thetop'></div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- TOPBAR -->
@include('common.topbar')
<!-- HEADER LOGO + SEARCH -->
@include('common.logo-search')
@include('common.category')
<section id="menu-slider">
    @include('common.panel-left')
</section>
<!--CONTENT-->
@yield('content')
<!--FOOTER-->
@include('common.footer')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset("assets/js/bootstrap.js") }}"></script>
<script src="{{ asset("assets/js/app.min.js") }}"></script>
<script src="{{ asset("assets/js/owl.carousel.js") }}"></script>
<script src="{{ asset("assets/js/jquery.jcarousel.js") }}"></script>
<script src="{{ asset("assets/js/jcarousel.connected-carousels.js") }}"></script>
<script src="{{ asset("assets/js/scroll.js") }}"></script>
<script src="{{ asset("assets/js/search-quick.js") }}"></script>
<script src="{{ asset("assets/js/custom-owl.js") }}"></script>
<script src="{{ asset("assets/js/jquery.flexslider.js") }}"></script>
<div class='scrolltop'>
    <div class='scroll icon'><i class="fa fa-4x fa-angle-up"></i></div>
</div>
</body>
</html>
