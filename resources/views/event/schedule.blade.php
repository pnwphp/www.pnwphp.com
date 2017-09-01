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
        <a href="http://cfp.pnwphp.com/" target="_blank" rel="noopener noreferrer" class="button">Submit a Talk Now</a>
    @else
        <strong>See You There!</strong> <br/>

        <i class="fa fa-beer"></i> We have so many amazing experiences lined up for this year's Pacific Northwest PHP conference! Starting with a special extended SeaPHP Meetup at the <a href="https://www.google.com/maps/place/500+Yale+Ave+N,+Seattle,+WA+98109/@47.6234354,-122.3322785,17z/data=!3m1!4b1!4m5!3m4!1s0x54901530fb16ae3f:0x1d52ccaf62a24944!8m2!3d47.6234318!4d-122.3300845" target="_blank" rel="noopener noreferrer">WeWork South Lake Union Building</a> on Wednesday evening and two tracks of workshops to choose from on <strong>Thursday at Washington University's <a href="https://www.google.com/maps/place/Johnson+Hall+(JHN)/@47.6545705,-122.3110406,17z/data=!3m1!4b1!4m5!3m4!1s0x549014f2a46431d9:0x1d835fab8ff115e!8m2!3d47.6545669!4d-122.3088519" target="_blank" rel="noopener noreferrer">Johnson Hall</a></strong>.

        <br/><i class="fa fa-ticket"></i>
        The main event is two full days of fantastic talks and panels <strong>at Washington University's <a href="https://www.google.com/maps/place/Kane+Hall+(KNE),+4069+Spokane+Ln,+Seattle,+WA+98105/@47.6549753,-122.309061,17z/data=!4m13!1m7!3m6!1s0x5490148d29600435:0x32ab53028ab205e7!2sKane+Hall+(KNE),+4069+Spokane+Ln,+Seattle,+WA+98105!3b1!8m2!3d47.6566273!4d-122.3091503!3m4!1s0x5490148d29600435:0x32ab53028ab205e7!8m2!3d47.6566273!4d-122.3091503" target="_blank" rel="noopener noreferrer">Kane Hall</a></strong> as well as the opportunity to share some meals, catch up with old friends, and make new ones!  Join us for the Pacific Northwest PHParty Friday night where we can talk about all we've learned, and celebrate the awesome developer community we share.

        <br/><i class="fa fa-smile-o"></i>
        Join us <strong>Friday Night</strong> from 7pm until 9:30pm at <a href="https://www.google.com/maps/place/Watertown+Hotel+-+A+Staypineapple+Hotel/@47.6595469,-122.319617,17z/data=!3m1!4b1!4m5!3m4!1s0x549014f45c8d7335:0x43198f06065ec430!8m2!3d47.6595433!4d-122.3174284" target="_blank" rel="noopener noreferrer">The Watertown Hotel</a> for the Pacific Northwest PHP Conference Party.

        <br/><i class="fa fa-cutlery"></i>
        If you're still in town on <strong>Sunday</strong> (and we hope you will be!) we will be meeting up from 11am until 2pm at <a href="http://www.shultzys.com/" target="_blank" rel="noopener noreferrer">Shultzy's Bar and Grill</a> for a PHP Community tradition: WurstCon.
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