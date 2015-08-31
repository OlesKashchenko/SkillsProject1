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

        <!-- secure fixed appearance for skype system changes -->
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

        <script type="text/javascript" src="/js/libs/modernizr-2.6.2.min.js"></script>

        <!--<script type="text/javascript" src="js/libs/ie-html5tags.js"></script>-->
        <!--<script type="text/javascript" src="js/libs/ie-mediaqueries.js"></script>-->

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
        {{--<script type="text/javascript" src="/js/libs/map.js"></script>--}}

        <script src='https://www.google.com/recaptcha/api.js'></script>

        <script type="text/javascript" src="/js/script.js"></script>
        <script type="text/javascript" src="/js/script_additional.js"></script>

        <!--Google Analytics Code-->
        <!--/Google Analytics Code-->
    </head>

    <body>
        <div class="wrapper @yield('wrapper_class')">
            @include('partials.nav_sidebar')

            <div class="wrapper_inner">
                @include('partials.header')

                <div class="middle">
                    @yield('main')
                </div>

                @include('partials.footer')
            </div>
        </div>

        <div class="alert_messages_holder"></div>

        <div class="popup_holder">
            <div class="dtable">
                <div class="dtcell">
                    @include('partials.popups')

                    @yield('custom_popups')
                </div>
                <i class="back" id="back"></i>
            </div>
        </div>

        @include('partials.base_scripts')

        @yield('custom_scripts')

        {{-- for investor index page --}}
        @yield('custom_scripts_additional')
    </body>
</html>