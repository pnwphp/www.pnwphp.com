<!DOCTYPE HTML>
<html>
<head>
    @include('partials.head')
</head>
<body class="left-sidebar">
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

    <!-- Main -->
    <div id="main-wrapper">
        <div class="container">
            <div class="row 200%">
                <div class="4u 12u$(medium)">
                    <div id="sidebar">

                        <!-- Sidebar -->
                        @yield('sidebar')

                    </div>
                </div>
                <div class="8u 12u$(medium) important(medium)">
                    <div id="content">

                        <!-- Content -->
                        <article>

                            <h2>@yield('main-title')</h2>

                            @yield('main-content')

                        </article>

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
@include('partials.scripts')

</body>
</html>