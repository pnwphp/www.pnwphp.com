@extends('layouts.left-sidebar')

@section('main-title')
    Fancy Hotel Name
@endsection

@section('main-content')
    <p>We are hosting our speakers in the Fancy Hotel Name in downtown Seattle conveniently located a few blocks from our venue.  We have also reserved a block of rooms at a discounted price for attendees.  The number of rooms available is as generous as we could manage, but still limited.</p>
    <p>Make your <a href="http://www.watertownseattle.com/" target="_blank">reservations</a> today!</p>

        <img src="{{ asset($image) }}" class="box feature" style="width:100%;margin:9px;">

@endsection

@section('sidebar')
    <!-- Sidebar -->
    <section>
        <div style="height:20em;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10749.69933338504!2d-122.31781506045607!3d47.656742805330694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x43198f06065ec430!2sWatertown+Hotel+-+A+Staypineapple+Hotel!5e0!3m2!1sen!2sus!4v1491537780957" frameborder="0" style="border:0; width: 100%; height: 100%" allowfullscreen></iframe>
        </div>
        <br/>
        <h3>Booking Your Room</h3>
        <p>When booking your room at the Fancy Hotel Name, be sure to use the promotional code PNWPHPISAWESOME to access our reserved block of rooms and benefit from the discounted price.</p>
        <footer>
            <a href="http://www.watertownseattle.com/" target="_blank" class="button icon fa-info-circle">Book Now</a>
        </footer>
    </section>
@endsection


