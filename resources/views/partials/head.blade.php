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