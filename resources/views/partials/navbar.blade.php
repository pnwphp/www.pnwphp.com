@php
    if (!isset($current)) {
        $current = 'welcome';
    }
@endphp

<nav id="nav">
    <ul>
        <li @if($current == 'welcome')class="current"@endif><a href="{{ url('index') }}">Welcome</a></li>
        <li @if($current == 'event')class="current"@endif>
            <a href="#">Conference</a>
            <ul>
                <li>
                    <a href="{{ url('speakers') }}"><h4>
                        <i class="fa fa-microphone"></i> Speakers
                    </h4></a>
                </li>
                <li><a href="{{ url('schedule') }}"><h4>
                            <i class="fa fa-check-square-o"></i> Schedule
                        </h4></a></li>
                <li><a href="{{ url('venue') }}"><h4>
                            <i class="fa fa-wifi"></i> Venue
                        </h4></a></li>
                <li><a href="{{ url('hotel') }}"><h4>
                            <i class="fa fa-bed"></i> Hotel
                        </h4></a></li>
            </ul>
        </li>
        <li @if($current == 'guides')class="current"@endif><a href="{{ url('guides') }}">Event Guides</a></li>
        <li @if($current == 'community')class="current"@endif><a href="{{ url('community') }}">Community</a></li>
        <li @if($current == 'sponsors')class="current"@endif><a href="{{ url('sponsors') }}">Sponsors</a></li>
    </ul>
</nav>