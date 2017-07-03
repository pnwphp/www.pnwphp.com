@extends('layouts.no-sidebar')

@section('title')
    Get in Touch!
@endsection

@section('introduction')
    We want to hear from you.
@endsection

@section('content')
    @include('partials.errors')

    <h3>Event Friends</h3>
    <p><a href="mailto:friends@pnwphp.com">friends@pnwphp.com</a></p>
    <h3>All Other Inquiries:</h3>
    <p><a href="mailto:2017@pnwphp.com">2017@pnwphp.com</a></p>
@endsection
