@extends($layout)

@section($title)
    Edit Talk Info
@endsection

@section($content)
    @include('partials.errors')
    {!! Form::model($talk, ['url' => 'admin/talk' ]) !!}
    {{ csrf_field() }}

    {!! Form::hidden('talkID', $talk['id']) !!}

    {!! Form::label('name', 'Talk Name') !!}
    {!! Form::text('name') !!}

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

    {!! Form::submit('Update Talk Info') !!}
    {!! Form::close() !!}

    <hr>
    <div class="alert alert-success">
        <h3>Associate a Speaker:</h3>
        {!! Form::open([ 'url' => 'admin/talk/add_speaker' ]) !!}
        {!! Form::hidden('talkID', $talk->id) !!}

        {!! Form::label('speaker', 'Speaker') !!}
        {!! Form::select('speaker', $speakers, null, ['placeholder' => 'Select a speaker...']) !!}

        {!! Form::submit('Add this Speaker') !!}
        {!! Form::close() !!}
    </div>

    <hr>
    @if(count($talk->speakers) > 0)
        <h3>Associated Speakers:</h3>
        @foreach($talk->speakers as $speaker)
            <div class="alert alert-info">
                {!! Form::open([ 'url' => 'admin/talk/remove_speaker' ]) !!}
                {!! Form::hidden('speakerID', $speaker->id) !!}
                {!! Form::hidden('talkID', $talk->id) !!}
                <h4>{{ $speaker->name }}</h4>
                {!! Form::submit('Remove this Speaker') !!}
                {!! Form::close() !!}
            </div>
        @endforeach
    @endif

    <hr>
    {!! Form::open([ 'url' => 'admin/talk/delete' ]) !!}
    {!! Form::hidden('talkID', $talk->id) !!}
    {!! Form::submit('Delete this Talk') !!}
    {!! Form::close() !!}
@endsection

@if($sidebar)
@section('sidebar')
    @include('partials.admin_sidebar')
@endsection
@endif
