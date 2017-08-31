<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>
<head>
    @include('partials.head')
</head>
<body class="{{{ ($route = Route::getFacadeRoot()->current()->uri()) == '/' ? 'homepage'  : $route }}}">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header-wrapper">
        <header id="header" class="container">

            <!-- Logo -->
            @include('partials.logo')

            <!-- Nav -->
            @include('partials.navbar')

        </header>
    </div>

    <div id="subnavigation">
        <div class="container">
            @include('partials.subnav')
        </div>
    </div>

    <!-- Banner -->
    <div id="banner-wrapper">
        <div id="banner">
            <div class="container">
                <div id="innerbox">
                    @yield('banner')
                </div>
            </div>
        </div>
    </div>

    <!-- Features -->
    <div id="features-wrapper">
        <div class="container">
            <div class="row">
                @yield('features')
            </div>
            @yield('features-button')
        </div>
    </div>

    <!-- Sponsors -->
    @if (!empty($sponsors))
    <div id="sponsors-wrapper">
        <div id="sponsors">
            <div class="container">
                <h2>Our Awesome Sponsors</h2>
                <div class="row">
                    @yield('sponsors')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Main -->
    <div id="main-wrapper">
        <div class="container">
            <div class="row 200%">
                <div class="4u 12u(medium)">

                    <!-- Sidebar -->
                    <div id="sidebar">
                        <section class="widget thumbnails">
                            @yield('main-sidebar')
                        </section>
                    </div>

                </div>
                <div class="8u 12u(medium) important(medium)">

                    <!-- Content -->
                    <div id="content">
                        <section class="last">
                            @yield('main-content')
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer-wrapper">
        <footer id="footer" class="container">
            @include('partials.footer')
        </footer>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.dropotron.min.js') }}"></script>
<script src="{{ asset('js/skel.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<!--[if lte IE 8]><script src="{{ asset('js/ie/respond.min.js') }}"></script><![endif]-->
<script src="{{ asset('js/main.js') }}?v=201708311522"></script>

</body>
</html>