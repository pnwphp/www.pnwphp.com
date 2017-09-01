<div class="3u 12u(medium)">

    <!-- Box -->
    <section class="box feature">
        <a href="{{ url('speakers') }}" class="image featured"><img src="{{ asset('storage/'.$feature->getImage()) }}" alt="" style="width:100%;"/></a>
        <div class="inner">
            <header>
                <h2>{{ $feature['name'] }}</h2>
                @foreach($feature->speakers as $speaker)
                <p>--{{ $speaker->name }}</p>
                @endforeach
            </header>
{{--            <p>{{ $feature['desc'] }}</p>--}}
        </div>
    </section>

</div>