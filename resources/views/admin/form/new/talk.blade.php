@extends($layout)

@section($title)
    Create Talk
@endsection

@section('main-content')
    @include('partials.errors')
    {!! Form::open(['url' => 'admin/talk' ]) !!}
    {{ csrf_field() }}

    {!! Form::hidden('talkID', 'new') !!}

    {!! Form::label('name', 'Talk Name') !!}
    {!! Form::text('name', 'Awesome Talk Name') !!}

    {!! Form::label('designation', 'Talk Type') !!}
    {!! Form::select('designation', $talkDesignations, null, ['placeholder' => 'Select a designation...']) !!}

    {!! Form::label('level', 'Talk Level') !!}
    {!! Form::select('level', $talkLevels, null, ['placeholder' => 'Select talk level...']) !!}

    {!! Form::label('category', 'Talk Category') !!}
    {!! Form::select('category', $talkCategories, null, ['placeholder' => 'Select talk level...']) !!}

    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc') !!}

    {!! Form::label('day', 'Presentation Day') !!}
    {!! Form::select('day', $talkDays, null, ['placeholder' => 'Select presentation day...']) !!}

    {!! Form::label('start_time', 'Start Time') !!}
    A 24 hour based clock time. Examples: 10:30, 16:45, 18:20.<br/>
    {!! Form::text('start_time') !!}

    {!! Form::label('end_time', 'End Time') !!}
    A 24 hour based clock time. Examples: 10:30, 16:45, 18:20.<br/>
    {!! Form::text('end_time') !!}

    {!! Form::submit('Create Talk') !!}
    {!! Form::close() !!}
@endsection

@if($sidebar)
@section('sidebar')
    @include('partials.admin_sidebar')
@endsection
@endif
