<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pacific Northwest PHP') }}</title>

    <!-- Styles -->
    @section('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!--[if lte IE 8]><link href="{{ asset('css/ie8.css') }}" rel="stylesheet"><![endif]-->
    @show

    <!-- Scripts -->
    <!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->
</head>
<body class="no-sidebar">
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

    <!-- Main -->
    <div id="main-wrapper">
        <div class="container">
            <div id="content">

                <!-- Content -->
                <article>

                    <h2>@yield('title')</h2>

                    <p>@yield('introduction')</p>

                    @yield('content')
                </article>
            </div>
        </div>
    </div>

@yield('feature')

    <!-- Footer -->
    <div id="footer-wrapper">
        <footer id="footer" class="container">
            @include('partials.footer')
        </footer>
    </div>

</div>

<!-- Scripts -->
@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dropotron.min.js') }}"></script>
    <script src="{{ asset('js/skel.min.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <!--[if lte IE 8]><script src="{{ asset('js/ie/respond.min.js') }}"></script><![endif]-->
    <script src="{{ asset('js/main.js') }}"></script>
@show
</body>
</html>