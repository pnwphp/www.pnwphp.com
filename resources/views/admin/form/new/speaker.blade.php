@extends($layout)

@section($title)
    Create Speaker
@endsection

@section('main-content')
    @include('partials.errors')
    {!! Form::open(['url' => 'admin/speaker', 'files' => true ]) !!}
    {{ csrf_field() }}

    {!! Form::hidden('speakerID', 'new') !!}

    {!! Form::label('name', 'Speaker Name') !!}
    {!! Form::text('name', 'Pink Panther') !!}

    {!! Form::label('email', 'E-Mail Address*') !!}
    {!! Form::email('email', 'pink@panther.com') !!}

    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image') !!}

    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc', 'This is the text which we will make available to visitors and attendees.') !!}

    {!! Form::submit('Create Speaker') !!}
    {!! Form::close() !!}
@endsection

@if($sidebar)
    @section('sidebar')
        @include('partials.admin_sidebar')
    @endsection
@endif
