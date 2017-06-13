@extends($layout)

@section($title)
    Edit Sponsor Info
@endsection

@section($content)
    @include('partials.errors')
    {!! Form::model($sponsor, ['url' => $url, 'files' => true ]) !!}
    {{ csrf_field() }}

    {!! Form::hidden('sponsorID', $sponsor['id']) !!}

    {!! Form::label('name', 'Sponsor Name') !!}
    {!! Form::text('name') !!}

    @if ($admin)
        {!! Form::label('active', 'Active?') !!}
        {!! Form::checkbox('active', false, $sponsor['active']) !!}
    @endif

    {!! Form::label('website', 'Website') !!}
    {!! Form::text('website') !!}

    {!! Form::label('contact', 'Contact Name') !!}
    {!! Form::text('contact') !!}

    {!! Form::label('email', 'E-Mail Address') !!}
    {!! Form::email('email') !!}

    {!! Form::label('phone', 'Phone Number') !!}
    {!! Form::text('phone') !!}

    {!! Form::label('image', 'Image') !!}
    <img src="{{ asset('storage/'.$sponsor['image']) }}" style="width:50px;">
    {!! Form::file('image', [ 'title' => 'Upload a new image' ]) !!}

    {!! Form::label('level', 'Desired Sponsorship Level') !!}
    {!! Form::select('level', $availableLevels, null, ['placeholder' => 'Select desired level...']) !!}

    {!! Form::label('desc', 'Description') !!}
    {!! Form::textarea('desc') !!}

    {!! Form::submit('Update Sponsor Info') !!}
    {!! Form::close() !!}

    <hr>
    <div class="alert alert-success">
        <h3>Associate a User:</h3>
        {!! Form::open([ 'url' => 'admin/sponsor/add_user' ]) !!}
        {!! Form::hidden('sponsorID', $sponsor['id']) !!}

        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name') !!}

        {!! Form::label('email', 'E-Mail Address') !!}
        {!! Form::email('email') !!}

        {!! Form::submit('Add this User') !!}
        {!! Form::close() !!}
    </div>

    <hr>
    @if(count($sponsor['users']) > 0)
        <h3>Associated Users:</h3>
        @foreach($sponsor['users'] as $user)
            <div class="alert alert-info">
                {!! Form::open([ 'url' => 'admin/sponsor/remove_user' ]) !!}
                {!! Form::hidden('userID', $user->id) !!}
                {!! Form::hidden('sponsorID', $sponsor['id']) !!}
                <h4>{{ $user->name }} ({{ $user->email }})</h4>
                {!! Form::submit('Remove this User') !!}
                {!! Form::close() !!}
            </div>
        @endforeach
    @endif
@if ($admin)
    <hr>
    {!! Form::open([ 'url' => 'admin/sponsor/delete' ]) !!}
    {!! Form::hidden('sponsorID', $sponsor['id']) !!}
    {!! Form::submit('Delete this Sponsor') !!}
    {!! Form::close() !!}
    @endif
@endsection

@if($sidebar)
@section('sidebar')
    @include('partials.admin_sidebar')
@endsection
@endif
