<div class="4u 12u(medium)">

    <!-- Box -->
    <section class="box feature">
        <a class="image"><img src="{{ asset('storage/'.$speaker->image) }}" alt="" /></a>
        <div class="inner">
            <header>
                <h2>{{ $speaker->name }}</h2>
                @foreach($speaker->talks as $talk)
                    <p>{{ $talk->name }}</p>
                @endforeach
            </header>
            <p>{{ $speaker->desc }}</p>
        </div>
    </section>

</div>