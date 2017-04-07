<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pacific Northwest PHP') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
<!--[if lte IE 8]><link href="{{ asset('css/ie8.css') }}" rel="stylesheet"><![endif]-->

    <!-- Scripts -->
<!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body class="homepage">
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

    <!-- Banner -->
    <div id="banner-wrapper">
        <div id="banner" class="box container">
            <div class="row">
                @yield('banner')
            </div>
        </div>
    </div>

    <!-- Features -->
    <div id="features-wrapper">
        <div class="container">
            <div class="row">
                @yield('features')
            </div>
        </div>
    </div>

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
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>