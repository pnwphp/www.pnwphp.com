@extends('layouts.no-sidebar')

@section('title')
    2017 Speakers
@endsection

@section('introduction')

    @if(config('app.cfp'))
        <strong>Shhh! It's a surprise!</strong> <br/>
        The Call for Papers is still open and the talk selection process ongoing, so we don't know who this year's speakers will be just yet.
        What we can tell you is that the submissions we have already received are amazing as are the technologists sending them in.
        We are so excited to get to hear these amazing talks live, and only wish we could select them all!<br/>
        <strong>The talks we might be missing are Yours!</strong><br/>
        If you haven't submitted talk proposals to share the things which excite and inspire you yet, we really hope you will!<br/><br/>
        <a href="http://cfp.pnwphp.com/" target="_blank" class="button">Submit a Talk Now</a>
    @else
        <strong>Shhh! It's a surprise!</strong> <br/>
        The Call for Papers has just closed and our organizers have begun the arduious process of narrowing down all of these amazing submissions to what will fit in our limited schedule and offer our attendees an outstanding experience.<br/><br/>
        We will announce the PNW PHP 2017 speakers and talks just as soon as we can!
    @endif

@endsection

@section('feature')
    <!-- Features -->
    @if(count($speakers) > 0)
        <div id="features-wrapper">
            <div class="container">
                <div class="row">
                    @foreach($speakers as $key => $speaker)
                        @include('partials.speaker', [ 'speaker' => $speaker ])
                        @if (++$key % 3 == 0)
                            <div style="clear:both; width: 100%; padding: 10px;"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection