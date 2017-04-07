@extends('layouts.no-sidebar')

@section('title')
    Kane Hall
@endsection

@section('introduction')
    University of Washington is an outstanding school with a beautiful campus located in the heart of Seattle. The main conference will be held at Kane Hall with talks in auditorium 120.
@endsection

@section('feature')
    @include('partials.album', ['images', $images])
@endsection