<!DOCTYPE HTML>
<html>
<head>
    @include('partials.head')
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
@include('partials.scripts')
</body>
</html>