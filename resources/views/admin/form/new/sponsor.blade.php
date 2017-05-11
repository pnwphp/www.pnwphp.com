@extends('layouts.left-sidebar')

@section('main-title')
    Create New Sponsor
@endsection

@section('main-content')
    @include('partials.errors')
    {!! Form::open(['url' => 'admin/sponsor', 'files' => true ]) !!}
    {{ csrf_field() }}

    {!! Form::hidden('sponsorID', 'new') !!}

    {!! Form::label('name', 'Sponsor Name') !!}
    {!! Form::text('name', 'Awesome Company Name') !!}

    {!! Form::label('active', 'Active?') !!}
    {!! Form::checkbox('active') !!}

    {!! Form::label('website', 'Website') !!}
    {!! Form::text('website', 'checkoutmysite.com') !!}

    {!! Form::label('contact', 'Contact Name*') !!}
    {!! Form::text('contact', 'Tessa Rocks') !!}

    {!! Form::label('email', 'E-Mail Address*') !!}
    {!! Form::email('email', 'example@gmail.com') !!}

    {!! Form::label('phone', 'Phone Number*') !!}
    {!! Form::text('phone', '(555) 867-5309') !!}

    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image') !!}

    {!! Form::label('level', 'Desired Sponsorship Level') !!}
    {!! Form::select('level', [
        'platinum' => 'Platinum',
        'gold' => 'Gold',
        'silver' => 'Silver',
        'bronze' => 'Bronze',
        'copper' => 'Copper',
        'community' => 'Community'
    ], null, ['placeholder' => 'Select desired level...']) !!}

    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc', 'This is the text which we will make available to visitors and attendees.') !!}

    {!! Form::submit('Create Sponsor') !!}
    {!! Form::close() !!}
@endsection

@section('sidebar')
    @include('partials.admin_sidebar')
@endsection
