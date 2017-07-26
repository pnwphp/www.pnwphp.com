<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>{{ config('app.name', 'Pacific Northwest PHP') }}</title>

<!-- Styles -->
@section('styles')
    <link href="{{ asset('css/main.css') }}?v=201707261335" rel="stylesheet">
    <!--[if lte IE 8]><link href="{{ asset('css/ie8.css') }}" rel="stylesheet"><![endif]-->
@show

<style>
    .event-name .event-date {
        line-height: initial;
        font-family: inherit;
        font-stretch: inherit;
        font-variant-ligatures: inherit;
        font-variant-caps: inherit;
        font-variant-numeric: inherit;
    }
    li {
        list-style: none;
    }
</style>

<!-- Scripts -->
<!--[if lte IE 8]><script src="{{ asset('js/ie/html5shiv.js') }}"></script><![endif]-->
<script src="https://use.fontawesome.com/11860f5734.js"></script>