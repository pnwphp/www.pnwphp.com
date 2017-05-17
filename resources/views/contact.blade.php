@extends('layouts.no-sidebar')

@section('title')
    Get in Touch!
@endsection

@section('introduction')
    We want to hear from you.
@endsection

@section('content')
    @include('partials.errors')
    {!! Form::open(['url' => url('contact')]) !!}
        {!! Form::label('email', 'E-Mail Address') !!}
        {!! Form::email('email', 'example@gmail.com') !!}

        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', 'Your Name Here') !!}

        {!! Form::label('subject', 'Subject') !!}
        {!! Form::text('subject', $subject) !!}

        {!! Form::label('content', 'Your Message') !!}
        {!! Form::textarea('content') !!}

        {!! Form::submit('Submit Message') !!}
    {!! Form::close() !!}
@endsection