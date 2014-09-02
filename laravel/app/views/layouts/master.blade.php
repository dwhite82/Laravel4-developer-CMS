<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')Yoursite.com</title>
    <meta charset="utf-8">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="">
    <meta name="author" content="Your Name" >
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    @section('headscripts')
        {{ HTML::style('css/screen_styles.css'); }}
        {{ HTML::style('css/lightbox.css'); }}
        {{ HTML::style('css/slider.css');}}
    @show
    <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        {{ HTML::style('css/ie_conditional.css'); }}
    <![endif]-->
</head>

<body>
<!--Start Page Container -->
<div class="page-container">
    <!--Start Header -->
    <header class="col-full">
        <div id="banner-logo">
            <h1 class="sm_dev">
                {{link_to(URL::route('home'), 'Yoursite.com')}}
            </h1>
            <p>Laravel 4 CMS</p>
        </div>
    </header>
    @include('layouts._main-nav')
    <!--End Header -->
    <div class="grid-container">
        @yield('body')
        <div id="footerpush"></div>
    </div>
    <!-- End Class Grid Container -->
</div><!-- End Class Page Container -->
<!--Start Footer -->
<footer>
    <div id="footer-group" class="gridrow">
        <div class="col12">
            <p id="copyright">&copy;2014&nbsp;Dan White</p>
            <nav id="footer_nav">
                {{link_to(URL::to('about/disclaimer'), 'Disclaimer')}}
                {{link_to(URL::to('contact'), 'Contact')}}
            </nav>
        </div>
    </div>
</footer>
<!--End Footer -->
@section('footscripts')
    {{ HTML::script('js/libs/jquery-1.7.2.min.js'); }}
    {{ HTML::script('js/libs/lightbox.js'); }}
    {{ HTML::script('js/libs/jquery.slides.min.js'); }}
    {{ HTML::script('js/functions.js'); }}
@show

</body>
</html>