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

    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc') !!}

    {!! Form::label('day', 'Event Day') !!}
    {!! Form::select('day', $eventDays, null, ['placeholder' => 'Select event day...']) !!}

    {!! Form::label('start_time', 'Start Time') !!}
    {!! Form::text('start_time') !!}

    {!! Form::label('end_time', 'End Time') !!}
    {!! Form::textarea('end_time') !!}

    {!! Form::submit('Create Event') !!}
    {!! Form::close() !!}
@endsection

@if($sidebar)
@section('sidebar')
    @include('partials.admin_sidebar')
@endsection
@endif
