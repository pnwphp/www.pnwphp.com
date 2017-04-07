<!-- Features -->
<div id="features-wrapper">
    <div class="container">
        <div class="row">
            @foreach($images as $image)
                <div class="4u 12u(medium)">
                    <!-- Box -->
                    <section class="box feature">
                        <a href="#" class="image featured"><img src="{{ asset($image['image']) }}" alt="" /></a>
                        <div class="inner">
                            <p>{{ $image['alt'] }}</p>
                        </div>
                    </section>
                </div>
                @if (++$loop->index % 3 == 0)
                    <div style="clear:both; width: 100%; padding: 10px;"></div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<br>
<hr>