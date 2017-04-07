<div class="4u 12u(medium)">

    <!-- Box -->
    <section class="box feature">
        <a href="#" class="image featured"><img src="{{ asset($feature->speaker->image) }}" alt="" /></a>
        <div class="inner">
            <header>
                <h2>{{ $feature['name'] }}</h2>
                <p>--{{ $feature->speaker->name }}</p>
            </header>
            <p>{{ $feature['desc'] }}</p>
        </div>
    </section>

</div>