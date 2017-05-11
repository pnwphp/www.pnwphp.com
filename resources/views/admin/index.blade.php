@extends('layouts.left-sidebar')

@section('main-title')
    Event Admin
@endsection

@section('sidebar')
    @include('partials.admin_sidebar')
@endsection

@section('main-content')
    <!-- Features -->
    <p>
        If there are any sponsor requests pending, they will be listed as the first items in the menu on the left.
    </p>
    <p>
        Additionally, event organizers may add and edit speakers, talks, and sponsors from this page.
    </p>
    <p>
        Select the speaker, talk, or sponsor you wish to edit to get started.
    </p>
@endsection