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
        <strong>What an Amazing Group of Speakers!</strong> <br/>
        We are delighted to be bringing together this group of exceptional technologists and presenters.  There were far more truly impressive submissions than we could fit into this community event, which means this conference is jam packed with goodness.  Below you can learn about the community members who will be stepping up to share thier knowledge.  We are looking forward to having a wonderful time learning about technology and getting to know each other better at Pacific Northwest PHP in Seattle this September!
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