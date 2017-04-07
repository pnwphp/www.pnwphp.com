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

    <!-- Main -->
    <div id="main-wrapper">
        <div class="container">
            <div class="row 200%">
                <div class="4u 12u$(medium)">
                    <div id="sidebar">

                        <!-- Sidebar -->
                        <section>
                            <h3>Subheading</h3>
                            <p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus.
                                Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat.
                                Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi
                                consequat etiam.</p>
                            <footer>
                                <a href="#" class="button icon fa-info-circle">Find out more</a>
                            </footer>
                        </section>

                        <section>
                            <h3>Subheading</h3>
                            <ul class="style2">
                                <li><a href="#">Amet turpis, feugiat et sit amet</a></li>
                                <li><a href="#">Ornare in hendrerit in lectus</a></li>
                                <li><a href="#">Semper mod quis eget mi dolore</a></li>
                                <li><a href="#">Quam turpis feugiat sit dolor</a></li>
                                <li><a href="#">Amet ornare in hendrerit in lectus</a></li>
                                <li><a href="#">Semper mod quisturpis nisi</a></li>
                            </ul>
                        </section>

                    </div>
                </div>
                <div class="8u 12u$(medium) important(medium)">
                    <div id="content">

                        <!-- Content -->
                        <article>

                            <h2>Left Sidebar</h2>

                            <p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus.
                                Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat.
                                Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi
                                consequat etiam lorem ipsum dolor sit amet nullam.</p>

                            <h3>More intriguing information</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac quam risus, at tempus
                                justo. Sed dictum rutrum massa eu volutpat. Quisque vitae hendrerit sem. Pellentesque lorem felis,
                                ultricies a bibendum id, bibendum sit amet nisl. Mauris et lorem quam. Maecenas rutrum imperdiet
                                vulputate. Nulla quis nibh ipsum, sed egestas justo. Morbi ut ante mattis orci convallis tempor.
                                Etiam a lacus a lacus pharetra porttitor quis accumsan odio. Sed vel euismod nisi. Etiam convallis
                                rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien.
                                Donec sagittis massa et leo semper a scelerisque metus faucibus. Morbi congue mattis mi.
                                Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum commodo luctus.</p>

                            <p>Phasellus odio risus, faucibus et viverra vitae, eleifend ac purus. Praesent mattis, enim
                                quis hendrerit porttitor, sapien tortor viverra magna, sit amet rhoncus nisl lacus nec arcu.
                                Suspendisse laoreet metus ut metus imperdiet interdum aliquam justo tincidunt. Mauris dolor urna,
                                fringilla vel malesuada ac, dignissim eu mi. Praesent mollis massa ac nulla pretium pretium.
                                Maecenas tortor mauris, consectetur pellentesque dapibus eget, tincidunt vitae arcu.
                                Vestibulum purus augue, tincidunt sit amet iaculis id, porta eu purus.</p>

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
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.dropotron.min.js') }}"></script>
<script src="{{ asset('js/skel.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<!--[if lte IE 8]><script src="{{ asset('js/ie/respond.min.js') }}"></script><![endif]-->
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>