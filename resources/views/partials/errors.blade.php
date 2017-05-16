@if (count($errors) > 0)
    <div class="alert alert-danger alert-important">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@include('flash::message')