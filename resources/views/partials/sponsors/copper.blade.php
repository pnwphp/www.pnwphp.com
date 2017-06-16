<div class="2u 12u(medium)" style="float:left; padding: 10px;">

    <!-- Box -->
    <a href="{{ $sponsor->website }}" class="feature-link" target="_blank" rel="noopener noreferrer">
        <section class="feature box" style="max-width: 12em; margin-left: auto; margin-right: auto;">
            <img src="{{ asset('storage/'.$sponsor->image) }}" alt="" class="image sponsor-image" />
            <div>
                <header>
                    <h2>{{ $sponsor->name }}</h2>
                </header>
                <p>{{ $sponsor->desc }}</p>
            </div>
        </section>
    </a>

</div>