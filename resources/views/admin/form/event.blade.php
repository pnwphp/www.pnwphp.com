@extends($layout)

@section($title)
    Edit Event Info
@endsection

@section($content)
    @include('partials.errors')
    {!! Form::model($event, ['url' => 'admin/event']) !!}
    {{ csrf_field() }}

    {!! Form::hidden('eventID', $event['id']) !!}

    {!! Form::label('name', 'Event Name') !!}
    {!! Form::text('name') !!}

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

    {!! Form::submit('Update Event Info') !!}
    {!! Form::close() !!}

    <hr>
    {!! Form::open([ 'url' => 'admin/event/delete' ]) !!}
    {!! Form::hidden('eventID', $event->id) !!}
    {!! Form::submit('Delete this Event') !!}
    {!! Form::close() !!}
@endsection

@if($sidebar)
@section('sidebar')
    @include('partials.admin_sidebar')
@endsection
@endif
