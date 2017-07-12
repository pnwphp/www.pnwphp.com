@extends('layouts.left-sidebar')

@section('main-title')
    University Inn
@endsection

@section('main-content')
    <p>We are hosting our speakers in the <a href="http://www.universityinnseattle.com/hotel-amenities/about-the-hotel.htm" target="_blank" rel="noopener noreferrer">University Inn</a> conveniently located a short distance from our venue.  We have also reserved a block of rooms at a discounted price for attendees.  The number of rooms available is as generous as we could manage, but still limited.</p>
    <p>Make your <a href="http://www.universityinnseattle.com/rooms.htm" target="_blank" rel="noopener noreferrer">reservations</a> today!</p>

        <img src="{{ asset($image) }}" class="box feature" style="width:100%;margin:9px;">
@endsection

@section('sidebar')
    <!-- Sidebar -->
    <section>
        <div style="height:20em;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.352374918228!2d-122.3196366844452!3d47.658150592408745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x549014f46f3ec3ab%3A0x9e8b16b0daa74e14!2s4140+Roosevelt+Way+NE%2C+Seattle%2C+WA+98105!5e0!3m2!1sen!2sus!4v1499115369663" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <br/>

        <h3>Booking Your Room</h3>
        <p>When booking your room at the University Inn, be sure to use the promotional code <strong>PNW2017</strong> to access our reserved block of rooms and benefit from the discounted price.</p>
        <footer>
            <a href="http://www.universityinnseattle.com/rooms.htm" target="_blank" rel="noopener noreferrer" class="button icon fa-info-circle">Book Now</a>
        </footer>

    </section>
@endsection


