@extends('layouts.welcome')

@section('banner')
    <div class="7u 12u(medium)">
        <h2>Event Guides</h2>
        <p>The event guide program is all about being proactive about community, and we need you to make it happen.</p>
    </div>
    <div class="5u 12u(medium)">
        <ul>
            <!-- <li><a href="#" class="button">Get Your Ticket</a></li> -->
            <li><a href="{{ url('contact/guides') }}" class="button">Connect with Us <i class="fa fa-umbrella"></i></a></li>
        </ul>
    </div>
@endsection

@section('features')
    <div class="4u 12u(medium)">
        <!-- Box -->
        <section class="box feature">
            <a href="#" class="image featured"><img src="{{ asset('images/area/seattle1.jpg') }}" alt="" /></a>
            <div class="inner">
                <header>
                    <h2>Connect</h2>
                    <p>Random Acts of Community</p>
                </header>
                <p>Whether you sign up as a guide or are accepting their service, you are helping to seed our community with interactions based on the perpetual knowledge sharing and support all great creative communities need to thrive.</p>
            </div>
        </section>
    </div>
    <div class="4u 12u(medium)">
        <!-- Box -->
        <section class="box feature">
            <a href="#" class="image featured"><img src="{{ asset('images/area/seattle2.jpg') }}" alt="" /></a>
            <div class="inner">
                <header>
                    <h2>Include</h2>
                    <p>Problem Solving for Humans</p>
                </header>
                <p>Assumed "defaults" prevent many of us from participating without help.  By having human beings available and empowered to help others overcome the specific obstacles to their inclusion, we can be adaptive to the needs of real people and reap the benefit of coming together in all our beautiful complexity.</p>
            </div>
        </section>
    </div>
    <div class="4u 12u(medium)">
        <!-- Box -->
        <section class="box feature">
            <a href="#" class="image featured"><img src="{{ asset('images/area/seattle3.jpg') }}" alt="" /></a>
            <div class="inner">
                <header>
                    <h2>Contribute</h2>
                    <p>Feedback Loops of Awesome</p>
                </header>
                <p>If you are wrangling the costs of being in marginalized demographics and spending your precious resources on joining in and taking part, or a conference veteran using your knowledge and confidence to dismantle some barriers to entry for the great missing minds of the community - you are bringing the awesome!</p>
            </div>
        </section>
    </div>
@endsection

@section('main-sidebar')
    <h3>We can help!</h3>
    <ul>
        <li>Will having people to ask questions improve your experience?</li>
        <li>Do you have physical accessibility concerns?</li>
        <li>Is this one of your first conferences?</li>
        <li>Are you new to programming generally?</li>
        <li>Would you benefit from help finding a seat?</li>
        <li>How about finding the restroom?</li>
        <li>Is navigating the dietary options a challenge?</li>
        <li>Would you feel safer with an escort to the restroom?</li>
        <li>Or making sure you get back to your lodgings after the days events?</li>
        <li>Lingering concerns not mentioned specifically here?</li>
        <li>Do you want to help keep these and other factors from excluding others?</li>
    </ul>
    <ul>
        <!-- <li><a href="#" class="button">Get Your Ticket</a></li> -->
        <li><a href="{{ url('contact/guides') }}" class="button">Connect with Us <i class="fa fa-umbrella"></i></a></li>
    </ul>
@endsection

@section('main-content')
    <h2>Event Guides</h2>
    <div class="close">
        <p>It's important to us that all of our speakers and attendees be able to enjoy the event as a safe and welcoming environment.</p>
        <div style="width: 100%; text-align:center">
            --- <i class="fa fa-ticket" style="margin-left:15px; margin-right:15px"></i> ---
        </div>
        <p>If you are new to conferences, have any concerns about getting around inside the event space -- such as finding restrooms or elevators --, and/or would feel more comfortable and confident having someone accompany you, we encourage you to select to be contacted by our Event Guide program in your registration.</p>
        <div style="width: 100%; text-align:center">
            --- <i class="fa fa-ticket" style="margin-left:15px; margin-right:15px"></i> ---
        </div>
        <p>If you have already registered without selecting that option, please get in touch with us by emailing guides@pnwphp.com and if you don't realize you would like support from our guides until the day of the event, mention it to an organizer or event helper and we will get you connected.</p>
        <div style="width: 100%; text-align:center">
            --- <i class="fa fa-ticket" style="margin-left:15px; margin-right:15px"></i> ---
        </div>
        <p>If you are a confident knowledgeable conference goer who would like to help insure that everyone at our event is made safe and welcome, select to sign up to be an event guide in your registration, and depending on need we will be in touch to discuss training for that role.</p>
        <div style="width: 100%; text-align:center">
            --- <i class="fa fa-ticket" style="margin-left:15px; margin-right:15px"></i> ---
        </div>
        <p>If you have already registered without selecting that option, please get in touch with us by emailing guides@pnwphp.com and we'll let you know if we need more guides and how to get started with training.</p><br/>
    </div>
@endsection
