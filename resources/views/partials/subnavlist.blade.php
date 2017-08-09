<ul>
    <li @if(Request::is('schedule'))class="current"@endif>
        <a href="{{ url('schedule') }}">
                Schedule
        </a>
    </li>
    <li @if(Request::is('speakers'))class="current"@endif>
        <a href="{{ url('speakers') }}">
                Speakers
        </a>
    </li>
    <li @if(Request::is('coc'))class="current"@endif>
        <a href="{{ url('coc') }}">
                Code of Conduct
        </a>
    </li>
    <li @if(Request::is('venue'))class="current"@endif>
        <a href="{{ url('venue') }}">
                Venue
        </a>
    </li>
    <li @if(Request::is('hotel'))class="current"@endif>
        <a href="{{ url('hotel') }}">
                Hotel
        </a>
    </li>
    <li>
        <a href="{{ url('tickets') }}" class="bold">
            Tickets
        </a>
    </li>
</ul>