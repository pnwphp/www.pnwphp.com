
@if($pendingSponsors)
    <h3>Pending Sponsors</h3>
    <ul>
        @foreach($pendingSponsors as $id => $sponsor)
            <li><a href="{{ url('admin/sponsor/'.$id) }}">{{ $sponsor }}</a></li>
        @endforeach
    </ul>
@endif

<h3>Speakers</h3>
<ul>
    @foreach($speakers as $id => $speaker)
        <li><a href="{{ url('admin/speaker/'.$id) }}">{{ $speaker }}</a></li>
    @endforeach
    <li><a href="{{ url('admin/speaker') }}">Add a New Speaker</a></li>
</ul>

<h3>Talks</h3>
<ul>
    @foreach($talks as $id => $talk)
        <li><a href="{{ url('admin/talk/'.$id) }}">{{ $talk }}</a></li>
    @endforeach
    <li><a href="{{ url('admin/talk') }}">Add a New Talk</a></li>
</ul>

<h3>Events</h3>
<ul>
    @foreach($events as $id => $event)
        <li><a href="{{ url('admin/event/'.$id) }}">{{ $event }}</a></li>
    @endforeach
    <li><a href="{{ url('admin/event') }}">Add a New Event</a></li>
</ul>

<h3>Current Sponsors</h3>
<ul>
    @foreach($sponsors as $sponsor)
        <li><a href="{{ url('admin/sponsor/'.$id) }}">{{ $sponsor }}</a></li>
    @endforeach
    <li><a href="{{ url('admin/sponsor') }}">Add a New Sponsor</a></li>
</ul>