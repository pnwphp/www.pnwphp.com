<div class="row">
    <div class="12u">
        <div class="widget contact center">
            <ul>
                <li><a target="_blank" rel="noopener noreferrer"
                       href="http://{{ config('app.twitter') }}"
                       class="icon fa-twitter">
                        <span class="label">Twitter</span>
                    </a>
                </li>
                <li><a target="_blank" rel="noopener noreferrer"
                       href="http://{{ config('app.facebook') }}"
                       class="icon fa-facebook">
                        <span class="label">Facebook</span>
                    </a>
                </li>
                <li><a target="_blank" rel="noopener noreferrer"
                       href="http://{{ config('app.meetup') }}"
                       class="icon fa-meetup">
                        <span class="label">Meetup</span>
                    </a>
                </li>
                <li><a href="{{ url('contact') }}"
                       class="icon fa-envelope">
                        <span class="label">Email</span>
                    </a>
                </li>
            </ul>
        </div>
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