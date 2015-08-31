<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta charset="utf-8">

        <title>@yield('seo_title')</title>
        <meta name="title" content="@yield('seo_title')"/>
        <meta name="keywords" content="@yield('seo_keywords')"/>
        <meta name="description" content="@yield('seo_description')"/>

        <meta property="og:title" content="" />
        <meta property="og:description" content=""/>
        <meta property="og:image" content="" />
        <link rel="image_src" href="">
        <meta property="og:url" content="" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">

        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" href="/css/bxslider/jquery.bxslider.css" type="text/css" media="screen, projection, print"/>
        <link rel="stylesheet" href="/css/libs/jquery.fs.selecter.css" type="text/css" media="screen, projection, print"/>
        <link rel="stylesheet" href="/css/map.css" type="text/css" media="screen, projection, print"/>
        <link rel="stylesheet" href="/css/main.css" type="text/css" media="screen, projection, print"/>
        <link rel="stylesheet" href="/css/additional.css" type="text/css" media="screen, projection, print"/>

        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

        <script type="text/javascript" src="/js/libs/modernizr-2.6.2.min.js"></script>

        <script type="text/javascript" src="/js/libs/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="/js/libs/jquery-ui-1.10.0.custom.js"></script>
        <script type="text/javascript" src="/js/libs/jquery.ui.touch-punch.min.js"></script>

        <script type="text/javascript" src="/js/libs/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="/js/libs/jquery.fs.selecter.min.js"></script>
        <script type="text/javascript" src="/js/libs/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/js/libs/jquery.ddslick.js"></script>

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="/js/libs/infobox.js"></script>
        <script type="text/javascript" src="/js/libs/markercluster.js"></script>

        <script type="text/javascript" src="/js/script.js"></script>
        <script type="text/javascript" src="/js/script_additional.js"></script>
    </head>

    <body>
        <div class="blur_error" style="background: url('{{asset('images/samples/bg_error.jpg')}}'); background-size: cover;"></div>
        <div class="blur_error_conteiner">
            <div class="blur_error_holder">
                <img src="{{asset('images/logo_header.png')}}" alt="">
                <h2>{{__('Ошибка')}} {{$code}}</h2>

                @yield('main')

                <a class="btn btn_red fix_error_page" href="{{geturl('/')}}"><span>{{__('Главная страница')}}</span></a>
            </div>
        </div>
    </body>
</html>