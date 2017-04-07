@extends('layouts.no-sidebar')

@section('title')
    Pacific Northwest PHP 2017 Schedule
@endsection

@section('introduction')
    <strong>Shhh! It's a surprise!</strong> <br/>
    The Call for Papers is still open and the talk selection process ongoing, so we don't which of the amazing talks we're looking at will fit into this year's schedule just yet.<br/>
    <strong>The talks we might still need are Yours!</strong><br/>
    If you haven't submitted talk proposals to share the things which excite and inspire you yet, we really hope you will!<br/><br/>
    <a href="http://cfp.pnwphp.com/" target="_blank" class="button">Submit a Talk Now</a>
@endsection

@section('content')
    <br/>
    <hr>
    <!-- Schedule -->
    <h3>September 6th - September 10th</h3>
    <div class="cd-schedule loading schedule">
        @include('partials.timeline')

        <div class="events">
            <ul>
                @foreach($schedule as $day => $events)
                    <li class="events-group">
                        <div class="top-info"><span>{{ $day }}</span></div>
                        <ul>
                            @foreach($events as $eventKey => $event)
                                <li class="single-event"
                                    data-start="{{ $event['start_time'] }}"
                                    data-end="{{ $event['end_time'] }}"
                                    data-content="{{ $eventKey }}"
                                    data-event="event-{{ ($loop->index % 3) + 1 }}"
                                >
                                    <a href="#0">
                                        <em class="event-name">{{ $eventKey }}: {{ $event['name'] }}</em>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

        @include('partials.event-modal', [ 'events' => $schedule ])

        <div class="cover-layer"></div>
    </div> <!-- .cd-schedule -->
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/schedule-main.js') }}"></script> <!-- Resource jQuery -->
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('css/schedule-reset.css') }}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('css/schedule-style.css') }}"> <!-- Resource style -->
@endsection