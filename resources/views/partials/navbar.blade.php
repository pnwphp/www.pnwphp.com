@php
    if (!isset($current)) {
        $current = '';
    }
@endphp

<nav id="nav">
    <ul>
        <li @if($current == 'welcome')class="current"@endif><a href="{{ url('/') }}">Welcome</a></li>
        <li @if($current == 'event')class="current"@endif>
            <a href="{{ url('schedule') }}">Conference</a>
            @include('partials.subnavlist')
        </li>
        <li @if($current == 'friends')class="current"@endif><a href="{{ url('friends') }}">Event Friends</a></li>
        <li @if($current == 'sponsors')class="current"@endif><a href="{{ url('sponsors') }}">Sponsors</a></li>
    </ul>
</nav>