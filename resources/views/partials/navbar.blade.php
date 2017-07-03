@php
    if (!isset($current)) {
        $current = '';
    }
@endphp

<nav id="nav">
    <ul>
        <li @if($current == 'welcome')class="current"@endif><a href="{{ url('index') }}">Welcome</a></li>
        <li @if($current == 'event')class="current"@endif>
            <a href="{{ url('schedule') }}">Conference</a>
            <ul>
                <li><a href="{{ url('schedule') }}"><h4>
                            <i class="fa fa-check-square-o"></i> Schedule
                        </h4></a></li>
                <li>
                    <a href="{{ url('speakers') }}"><h4>
                        <i class="fa fa-microphone"></i> Speakers
                    </h4></a>
                </li>
                <li><a href="{{ url('coc') }}"><h4>
                            <i class="fa fa-handshake-o"></i> Code of Conduct
                        </h4></a></li>
                <li><a href="{{ url('venue') }}"><h4>
                            <i class="fa fa-wifi"></i> Venue
                        </h4></a></li>
                <li><a href="{{ url('hotel') }}"><h4>
                            <i class="fa fa-bed"></i> Hotel
                        </h4></a></li>
            </ul>
        </li>
        <li @if($current == 'friends')class="current"@endif><a href="{{ url('friends') }}">Event Friends</a></li>
        <li @if($current == 'sponsors')class="current"@endif><a href="{{ url('sponsors') }}">Sponsors</a></li>
    </ul>
</nav>