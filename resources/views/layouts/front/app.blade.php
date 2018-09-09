<!DOCTYPE html>
<html lang="uk">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-9325492-23"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ env('GOOGLE_ANALYTICS') }}');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Shop.Cbua.biz | Купуйте просто, швидко та ефективно</title>

    <meta name="description" content="Інтернет магазин Shop.CBua.biz | Купуйте просто, швидко та ефективно">
    <meta name="tags" content="modern, новый,новий, інтернет магазин,интернет магазин, e-commerce,  free,  php,   shop, shopping, responsive, fast,  cart, товари,дешево,зручно   ">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

    @yield('css')
    <meta property="og:url" content="{{ request()->url() }}"/>
    @yield('og')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->






    <link rel="icon" href="{{ asset('img/fav-icon.png') }}" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <!-- Icon css link -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/line-icon/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/elegant-icon/style.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="{{ asset('vendors/revolution/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/revolution/css/layers.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/revolution/css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    <!-- Extra plugin css -->
    <link href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-selector/css/bootstrap-select.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/accordion-menu.css') }}" rel="stylesheet">

<style>
    .top_header_middle a:before{
        content: '';
    }
        li.cart_cart a:before {
        content: '{{ $cartCount }}';
    }
</style>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-4569151167229039",
            enable_page_level_ads: true
        });
    </script>
</head>
<body class="home_sidebar">
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>

<div class="home_box">
<header class="shop_header_area carousel_menu_area">
    <div class="carousel_top_header black_top_header row m0">
        <div class="container">
            <div class="carousel_top_h_inner">
                <div class="float-md-left">

                </div>
                <div class="float-md-right">
                    <ul class="account_list">
                        @if(auth()->check())
                            <li><a href="{{ route('accounts') }}" title="Мій профіль"> Мій профіль</a></li>
                            <li ><a href="{{ route('logout') }}"  title="Вийти"> Вийти</a></li>
                        @else
                            <li><a href="{{ route('login') }}" title="Увійти">Увійти</a></li>
                            <li><a href="{{ route('register') }}" title="Зареєструватися">Зареєструватися</a></li>
                        @endif

                     <li><a href="{{route('wish')}}">Список бажань (@if(Auth::user()){{Wishlist::count(auth()->user()->id)}}@else{{0}}@endif)</a></li>
                        <li><a href="/cart">Корзина</a></li>
                        <li><a href="/checkout">Оформлення заказу</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel_menu_inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/"><img src="{{asset('img/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item active"><a class="nav-link " href="/">Головна</a></li>

                     <!--   <li class="nav-item dropdown submenu active">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Home <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="index.html">Home Simple</a></li>
                                <li class="nav-item"><a class="nav-link" href="home-carousel.html">Home Carousel</a></li>
                                <li class="nav-item"><a class="nav-link" href="home-fullwidth.html">Home Full Width</a></li>
                                <li class="nav-item"><a class="nav-link" href="home-parallax.html">Home Parallax</a></li>
                                <li class="nav-item"><a class="nav-link" href="home-sidebar.html">Home Boxed</a></li>
                                <li class="nav-item"><a class="nav-link" href="home-fixed-menu.html">Home Fixed</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="compare.html">Compare</a></li>
                                <li class="nav-item"><a class="nav-link" href="checkout.html">Checkout Method</a></li>
                                <li class="nav-item"><a class="nav-link" href="register.html">Checkout Register</a></li>
                                <li class="nav-item"><a class="nav-link" href="track.html">Track</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="404.html">404</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shop <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-2column.html">Prodcut No Sidebar</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-3column.html">Prodcut Two Column</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-4column.html">Product Grid</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-left-sidebar.html">Categories Left Sidebar</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-right-sidebar.html">Categories Right Sidebar</a></li>
                                <li class="nav-item"><a class="nav-link" href="categories-grid-left-sidebar.html">Categories Grid Sidebar</a></li>
                                <li class="nav-item"><a class="nav-link" href="product-details.html">Prodcut Details 01</a></li>
                                <li class="nav-item"><a class="nav-link" href="product-details2.html">Prodcut Details 02</a></li>
                                <li class="nav-item"><a class="nav-link" href="product-details3.html">Prodcut Details 03</a></li>
                                <li class="nav-item"><a class="nav-link" href="shopping-cart.html">Shopping Cart 01</a></li>
                                <li class="nav-item"><a class="nav-link" href="shopping-cart2.html">Shopping Cart 02</a></li>
                                <li class="nav-item"><a class="nav-link" href="empty-cart.html">Empty Cart</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item"><a class="nav-link" href="/action-products">Акційні Товари</a></li>
                        <li class="nav-item"><a class="nav-link" href="/bu-products">Б/У
                                Товари</a></li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">

                        @if(auth()->check())
                            <li class="user_icon"><a href="{{ route('accounts') }}" title="Мій профіль"><i class="icon-home icons"></i> </a></li>
                            <li class="user_icon"><a href="{{ route('logout') }}"  title="Вийти"><i class="icon-logout icons"></i> </a></li>
                        @else
                            <li class="user" class="user_icon"><a href="{{ route('login') }}" title="Увійти"><i class="icon-user icons"></i></a></li>
                            <li class="user" class="user_icon"><a href="{{ route('register') }}" title="Зареєструватися"><i class="icon-user-follow icons"></i></a></li>
                        @endif

                        <li class="cart cart_cart hidden-sm"><a href="{{ route('cart.index') }}"><i class="icon-handbag icons"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

</header>






@yield('content')

@include('layouts.front.footer')
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<!-- Rev slider js -->
<script src="{{ asset('vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset("vendors/revolution/js/jquery.themepunch.revolution.min.js") }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset("vendors/revolution/js/extensions/revolution.extension.video.min.js") }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<!-- Extra plugin css -->
<script src="{{ asset('vendors/counterup/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vendors/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-selector/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('vendors/image-dropdown/jquery.dd.min.js') }}"></script>
<script src="{{ asset('js/smoothscroll.js') }}"></script>
<script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('vendors/magnify-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendors/vertical-slider/js/jQuery.verticalCarousel.js') }}"></script>
<script src="{{ asset('vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{  asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ asset('js/accordion-menu.js') }}"></script>


@yield('js')

</body>
</html>