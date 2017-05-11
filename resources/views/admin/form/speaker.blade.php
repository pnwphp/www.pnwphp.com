@extends($layout)

@section($title)
    Edit Speaker Info
@endsection

@section($content)
    @include('partials.errors')

    {!! Form::model($speaker, ['url' => $url, 'files' => true ]) !!}
    {{ csrf_field() }}

    {!! Form::hidden('speakerID', $speaker['id']) !!}

    {!! Form::label('name', 'Speaker Name') !!}
    {!! Form::text('name') !!}

    {!! Form::label('image', 'Image') !!}
    <img src="{{ asset('storage/'.$speaker['image']) }}" style="width:50px;">
    {!! Form::file('image', [ 'title' => 'Upload a new image' ]) !!}

    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc') !!}

    {!! Form::submit('Update Speaker Info') !!}
    {!! Form::close() !!}

    @if($admin)
    <hr>
    <div class="alert alert-success">
        <h3>Associate a User:</h3>
        <p>This will remove the existing user if present.</p>
        {!! Form::open([ 'url' => 'admin/speaker/add_user' ]) !!}
        {!! Form::hidden('speakerID', $speaker->id) !!}

        {!! Form::label('email', 'E-Mail Address') !!}
        {!! Form::email('email') !!}

        {!! Form::submit('Associate this User') !!}
        {!! Form::close() !!}
    </div>

    <hr>
    @if(count($speaker->user) > 0)
        <h3>Associated User:</h3>
        <div class="alert alert-info">
            {!! Form::open([ 'url' => 'admin/speaker/remove_user' ]) !!}
            {!! Form::hidden('userID', $speaker->user->id) !!}
            {!! Form::hidden('speakerID', $speaker->id) !!}
            <h4>{{ $speaker->user->name }}</h4>
            {!! Form::submit('Remove this User') !!}
            {!! Form::close() !!}
        </div>
    @endif

    <hr>
    {!! Form::open([ 'url' => 'admin/speaker/delete' ]) !!}
    {!! Form::hidden('speakerID', $speaker->id) !!}
    {!! Form::submit('Delete this Speaker') !!}
    {!! Form::close() !!}
    @endif
@endsection

@if($sidebar)
    @section('sidebar')
        @include('partials.admin_sidebar')
    @endsection
@endif
