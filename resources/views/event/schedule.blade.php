@extends('layouts.no-sidebar')

@section('title')
    Pacific Northwest PHP 2017 Schedule
@endsection

@section('introduction')
    @if(config('app.cfp'))
        <strong>Shhh! It's a surprise!</strong> <br/>
        The Call for Papers is still open and the talk selection process ongoing, so we don't which of the amazing talks we're looking at will fit into this year's schedule just yet.<br/>
        <strong>The talks we might still need are Yours!</strong><br/>
        If you haven't submitted talk proposals to share the things which excite and inspire you yet, we really hope you will!<br/><br/>
        <a href="http://cfp.pnwphp.com/" target="_blank" class="button">Submit a Talk Now</a>
    @else
        <strong>See You There!</strong> <br/>
        We have so many amazing experiences lined up for this year's Pacific Northwest PHP conference! Starting with a special extended SeaPHP Meetup and a full day of workshops.  The main event is two full days of fantastic talks and panels as well as the opportunity to share some meals, catch up with old friends, and make new ones!  Then join in the after party where we can talk about all we've learned, and celebrate the awesome developer community we share.
    @endif
@endsection

@section('content')
    @if(count($schedule) > 0)
        <br/>
        <hr>
        <!-- Schedule -->
        <h3>September 6th - September 9th</h3>
        @if(empty($schedule['Wednesday']))
            <p>Coming Soon!</p>
        @endif
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
                                            <em class="event-name">{{ $event['name'] }}</em>
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
    @endif
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/schedule-main.js') }}"></script> <!-- Resource jQuery -->
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/schedule-reset.css') }}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('css/schedule-style.css') }}"> <!-- Resource style -->
    @parent
@endsection