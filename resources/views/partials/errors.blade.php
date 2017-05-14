@if (count($errors) > 0)
    <div class="alert alert-danger alert-important">

        <button type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true"
        >&times;</button>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@include('flash::message')