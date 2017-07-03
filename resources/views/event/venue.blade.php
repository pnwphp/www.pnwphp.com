@extends('layouts.right-sidebar')

@section('main-title')
    Washington University's Kane Hall
@endsection

@section('main-content')
    <p>University of Washington is an outstanding school with a beautiful campus located in the heart of Seattle. The main conference will be held at Kane Hall, and the workshops in nearby Johnson Hall.</p>

    <ul>
        <li><i class="fa fa-location-arrow"></i>
            <strong><a href="{{ url('venue/getting-here') }}"> Getting Here</a></strong>
        </li>
        <li><i class="fa fa-camera"></i>
            <strong><a href="{{ url('venue/album') }}"> Have a Look Around</a></strong>
        </li>
    </ul>

    <div style="height:25em;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.4257450102427!2d-122.31124898455218!3d47.656725092507514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5490148d297e703f%3A0x46fb837b5e7c7474!2sKane+Hall+(KNE)!5e0!3m2!1sen!2sus!4v1491530837101" frameborder="0" style="border:0; width: 100%; height: 100%" allowfullscreen></iframe>
    </div>

@endsection

@section('sidebar')
    <!-- Sidebar -->
    <section>
        <h3>Getting Around</h3>
        <p>This year we are launching a new <a href="{{ url('friends') }}">Event Friends</a> program to make sure everyone can access the support and assistance they need to feel comfortable and confident during the conference.</p>
        <p>Whether you are someone who might benefit from Event Friends, or someone who might find it rewarding to be one, we hope you will take a look at the program and get involved.</p>
        <footer>
            <a href="{{ url('friends') }}" class="button icon fa-info-circle">Find out more</a>
        </footer>
    </section>

    <section>
        <h3>Presentation Space</h3>
        <p>When not acting as a venue for spectacular tech conferences and other community events, Kane Hall's Auditorium 120 serves the students of Washington University as a classroom.</p>
        <p>The university's page for the auditorium includes useful specifics such as the technical setup, basic accessibility information, and a detailed floorplan.</p>
        <footer>
            <a href="https://www.washington.edu/classroom/KNE+120" target="_blank" rel="noopener noreferrer" class="button icon fa-info-circle">Find out more</a>
        </footer>
    </section>
@endsection


