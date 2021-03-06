@extends('layouts.no-sidebar')

@section('title')
    2017 Sponsors
@endsection

@section('introduction')
    The PNWPHP Conference is hosted by the <a href="http://www.seaphp.com/">Seattle PHP User Group</a>, a non-profit organization run by volunteers. We have created this event as a service to the PHP developer community in the Pacific Northwest region.<br/>
    <div style="text-align:center; width: 100%;">
        <strong>Our amazing sponsors provide the resources we need to make it happen!</strong>
    </div>

    @if(config('app.sponsorship'))
        If you are a company or organization that employs, recruits, supports, or provides services to PHP developers become a sponsor today!<br/><br/>
        <a href="{{ url('sponsors/new') }}" class="button button-medium">Become a Sponsor</a>
    @endif

@endsection

@section('feature')
    <!-- Features -->
    <div id="features-wrapper">
        <div class="container" id="sponsors">
            @if(count($sponsors['tier1']) > 0)
                <h3>Platinum Sponsor</h3><div style="clear:both"></div>
                @foreach($sponsors['tier1'] as $key => $sponsor)
                    @include('partials.sponsors.platinum', [ 'sponsor' => $sponsor ])
                    <div style="clear:both; width: 100%; padding: 10px;"></div>
                @endforeach
            @endif
            @if(count($sponsors['tier2']) > 0)
                <div style="clear:both; width: 100%; padding: 10px;"></div>
                <br/>
                <hr/>
                    <h3>Gold Sponsors</h3><div style="clear:both"></div>
                    @foreach($sponsors['tier2'] as $key => $sponsor)
                        @include('partials.sponsors.gold', [ 'sponsor' => $sponsor ])
                        @if (++$key % 2 == 0)
                            <div style="clear:both; width: 100%; padding: 10px;"></div>
                        @endif
                    @endforeach
            @endif
            @if(count($sponsors['tier3']) > 0)
                <div style="clear:both; width: 100%; padding: 10px;"></div>
                <br/>
                <hr/>
                <h3>Silver Sponsors</h3><div style="clear:both"></div>
                @foreach($sponsors['tier3'] as $key => $sponsor)
                    @include('partials.sponsors.silver', [ 'sponsor' => $sponsor ])
                    @if (++$key % 3 == 0)
                        <div style="clear:both; width: 100%; padding: 10px;"></div>
                    @endif
                @endforeach
            @endif
            @if(count($sponsors['tier4']) > 0)
                <div style="clear:both; width: 100%; padding: 10px;"></div>
                <br/>
                <hr/>
                <h3>Bronze Sponsors</h3><div style="clear:both"></div>
                @foreach($sponsors['tier4'] as $key => $sponsor)
                    @include('partials.sponsors.bronze', [ 'sponsor' => $sponsor ])
                    @if (++$key % 4 == 0)
                        <div style="clear:both; width: 100%; padding: 10px;"></div>
                    @endif
                @endforeach
            @endif
            @if(count($sponsors['tier5']) > 0)
                <div style="clear:both; width: 100%; padding: 10px;"></div>
                <br/>
                <hr/>
                <h3>Copper Sponsors</h3><div style="clear:both"></div>
                @foreach($sponsors['tier5'] as $key => $sponsor)
                    @include('partials.sponsors.copper', [ 'sponsor' => $sponsor ])
                    @if (++$key % 5 == 0)
                        <div style="clear:both; width: 100%; padding: 10px;"></div>
                    @endif
                @endforeach
            @endif
            @if(count($sponsors['tier6']) > 0)
                <div style="clear:both; width: 100%; padding: 10px;"></div>
                <br/>
                <hr/>
                <h3>Community Sponsors</h3><div style="clear:both"></div>
                @foreach($sponsors['tier6'] as $key => $sponsor)
                    @include('partials.sponsors.community', [ 'sponsor' => $sponsor ])
                    @if (++$key % 3 == 0)
                        <div style="clear:both; width: 100%; padding: 10px;"></div>
                    @endif
                @endforeach
            @endif
            <div style="clear:both; width: 100%; padding: 10px;"></div>
            <br/>
            <hr/>

                @if(config('app.sponsorship'))
                    <div style="width:100%; text-align:center;">
                        <a href="{{ url('sponsors/new') }}" class="button button-medium" style="margin-left:auto; margin-right: auto;">Become a Sponsor</a>
                    </div>
                @endif
        </div>
    </div>
@endsection