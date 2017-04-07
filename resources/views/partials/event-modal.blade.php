<div class="event-modal">
    <header class="header">
        <div class="content">
            <span class="event-date"></span>
            <h3 class="event-name"></h3>
        </div>

        <div class="header-bg"></div>
    </header>

    <div class="body">
        <div class="event-info"></div>
        <div class="body-bg"></div>
    </div>

    <a href="#0" class="close">Close</a>
</div>

@foreach($events as $day => $dayEvents)
    @foreach($dayEvents as $tag => $event)
        <div class="event-info hidden" id="{{ $tag }}">
            <div>
                <header>
                    <h2>{{ $tag }}: {{ $event->name }}</h2>
                </header>
                <p>{{ $event->desc }}</p>
            </div>
        </div>
    @endforeach
@endforeach
