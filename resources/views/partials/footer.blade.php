<div class="row">
    <div class="3u 6u(medium) 12u$(small)">

        <!-- Links -->
        <!-- Replace this stuff w grid logos of sponsors -->
        <section class="widget links">
            <h3>Our Awesome Sponsors</h3>
            <ul class="style2">
                @foreach($sponsorColumn1 as $sponsor)
                    <li><a href="{{ url('sponsors#'.$sponsor['id']) }}">{{ $sponsor['name'] }}</a></li>
                @endforeach
            </ul>
        </section>

    </div>
    <div class="3u 6u$(medium) 12u$(small)">

        <!-- Links -->
        <section class="widget links">
            <h3><br/></h3>
            <ul class="style2">
                @foreach($sponsorColumn2 as $sponsor)
                    <li><a href="{{ url('sponsors#'.$sponsor['id']) }}">{{ $sponsor['name'] }}</a></li>
                @endforeach
            </ul>
        </section>

    </div>
    <div class="3u 6u(medium) 12u$(small)">

        <!-- Links -->
        <section class="widget links">
            <h3><br/></h3>
            <ul class="style2">
                @foreach($sponsorColumn3 as $sponsor)
                    <li><a href="{{ url('sponsors#'.$sponsor['id']) }}">{{ $sponsor['name'] }}</a></li>
                @endforeach
            </ul>
        </section>

    </div>
    <div class="3u 6u$(medium) 12u$(small)">

        <!-- Contact -->
        <section class="widget contact last">
            <h3>Contact Us</h3>
            <ul>
                <li><a href="{{ config('app.twitter') }}" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="{{ config('app.facebook') }}" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="{{ config('app.meetup') }}" class="icon fa-meetup"><span class="label">Meetup</span></a></li>
                <li><a href="{{ config('app.email') }}" class="icon fa-envelope"><span class="label">Email</span></a></li>
            </ul>
        </section>

    </div>
</div>
<div class="row">
    <div class="12u">
        <div id="copyright">
            <ul class="menu">
                @if(Auth::check())
                    <li>&copy; PNWPHP <a href="{{ url('logout') }}"><i class="fa fa-key"></i></a></li>
                @else
                    <li>&copy; PNWPHP <a href="{{ url('login') }}"><i class="fa fa-key"></i></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>