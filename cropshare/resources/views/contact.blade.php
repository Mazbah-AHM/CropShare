<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Contact</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/strip.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">

        <div class="responsive-header">
            <div class="mh-head first Sticky">
                <span class="mh-btns-left">
                    <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
                </span>
                <span class="mh-text">
                    <a href="newsfeed.html" title=""><img src="images/logo2.png" alt=""></a>
                </span>
                <span class="mh-btns-right">
                    <a class="fa fa-sliders" href="#shoppingbag"></a>
                </span>
            </div>
            <div class="mh-head second">
                <form class="mh-form">
                    <input placeholder="search" />
                    <a href="#/" class="fa fa-search"></a>
                </form>
            </div>
            <nav id="menu" class="res-menu">
                <ul class="main-menu">
                    <li>
                        <a href="{{ route('home') }}" title="">News Feed</a>
                    </li>
                    <li>
                        <a href="" title="">About Us</a>
                    </li>
                </ul>
            </nav>
        </div><!-- responsive header -->

        <div class="topbar stick">
            <div class="logo">
                <a title="" href="newsfeed.html"><img src="images/logo.png" alt=""></a>
            </div>

            <div class="top-area">
                <ul class="main-menu">
                    <li>
                        <a href="{{ route('home') }}" title="">News Feed</a>
                    </li>
                    <li>
                        <a href="" title="">About Us</a>
                    </li>
                </ul>
            </div>
        </div>

        <section>
            <div class="gap no-top overlap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contct-info">
                                @foreach ($contact as $con)
                                    <div class="cntct-adres">
                                        <h3>contact info</h3>
                                        <ul>
                                            <li>
                                                <i class="fa fa-user"></i>
                                                <span>{{ $con->name }}</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-mobile-phone"></i>
                                                <span>{{ $con->phone }}</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope-o"></i>
                                                <span><a href="mailto:{{ $con->email }}" class="__cf_email__"
                                                        data-cfemail="{{ $con->email }}">{{ $con->email }}</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- contact info -->

        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="{{ asset('js/strip.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/map-init.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

</body>

</html>
