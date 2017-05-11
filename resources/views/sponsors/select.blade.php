@extends('layouts.no-sidebar')

@section('title')
    Edit Sponsor Info
@endsection

@section('content')
    @include('partials.errors')


    <p>You are administering multiple sponsorships (Thank you!)</p>
    <p>Select the sponsorship you would like to edit:</p>

    <ul>
        @foreach($sponsors as $sponsor)
            <li><a href="{{ url('sponsor/admin/'.$sponsor->id) }}">{{ $sponsor->name }}</a></li>
        @endforeach
    </ul>
@endsection
