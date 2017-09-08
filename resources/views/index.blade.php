@extends('layouts.welcome')

@section('banner')
    <h2>Pacific Northwest PHP</h2>
    <h4>September 7th - 9th @ Washington University's Kane Hall</h4>
    <p>Seattle's annual PHP community conference</p>
    <ul>
        @include('partials.action-button')
    </ul>
@endsection

@section('features')
    @foreach($features as $feature)
        @include('partials.featured', ['feature' => $feature])
    @endforeach
@endsection

@section('features-button')
    <div class="center">
        <a href="{{ url('speakers') }}" class="button button-medium">See all speakers</a>
    </div>
@endsection

@section('main-sidebar')
        <div id="twitter-stream">
            <a class="twitter-timeline" data-height="480" href="https://twitter.com/PNWPHP">Tweets by PNWPHP</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
@endsection

@section('main-content')
    <h2>Join us in Seattle this September!</h2>
    <p>The Pacific Northwest PHP Conference is a 3-day event for web developers focused but not confined to PHP. In previous years have included world renowned and talented new speakers covering a range of topics like APIs, Frameworks, testing and version control.</p>
    <p>This year we are looking forward to bringing together the rich and diverse talent of our community as speakers and attendees to share knowledge and inspiration.</p>
    <p>We will dive deep into understanding technology, tools, and processes we all rely on, and explore a wide range technology and processes we are eager to get to know.</p>

    <ul>
        @include('partials.action-button')
    </ul>
@endsection

@section('sponsors')
    @foreach($sponsors as $tier => $tierSponsors)
        @if (count($tierSponsors))
            <div class="4u 12u(medium) tier">
                <h3>{{ $tier }}</h3>
                @foreach($tierSponsors as $sponsor)
                    <div class="sponsor">
                        <a href="{{ $sponsor->website }}" class="feature-link" target="_blank" rel="noopener noreferrer" title="{{{ $sponsor->name }}}">
                            <img src="{{ asset('storage/'.$sponsor->image) }}" alt="{{{ $sponsor->name }}}" class="image sponsor-image" />
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach
@endsection