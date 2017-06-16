@extends($layout)

@section($title)
    Create Event
@endsection

@section('main-content')
    @include('partials.errors')
    {!! Form::open(['url' => 'admin/event' ]) !!}
    {{ csrf_field() }}

    {!! Form::hidden('eventID', 'new') !!}

    {!! Form::label('name', 'Event Name') !!}
    {!! Form::text('name', 'Awesome Event Name') !!}

    {!! Form::label('location', 'Event Location') !!}
    {!! Form::text('location') !!}

    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc') !!}

    {!! Form::label('day', 'Event Day') !!}
    {!! Form::select('day', $eventDays, null, ['placeholder' => 'Select event day...']) !!}

    {!! Form::label('start_time', 'Start Time') !!}
    A 24 hour based clock time. Examples: 10:30, 16:45, 18:20.<br/>
    {!! Form::text('start_time') !!}

    {!! Form::label('end_time', 'End Time') !!}
    A 24 hour based clock time. Examples: 10:30, 16:45, 18:20.<br/>
    {!! Form::text('end_time') !!}

    {!! Form::submit('Create Event') !!}
    {!! Form::close() !!}
@endsection

@if($sidebar)
@section('sidebar')
    @include('partials.admin_sidebar')
@endsection
@endif
