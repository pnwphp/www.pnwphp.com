@extends('layouts.no-sidebar')

@section('introduction')
    <h2>New Sponsor Inquiry</h2>
@endsection

@section('feature')
    @if(config('app.sponsorship'))
        @include('partials.sponsors.form')
    @else
        <p>Sponsorship opportunities for this event are currently closed.  Please, get in touch with one of our organizers for more information.</p>
    @endif
@endsection
