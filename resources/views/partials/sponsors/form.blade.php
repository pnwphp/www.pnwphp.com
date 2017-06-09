<div id="alt-main-wrapper">
    <div class="container">
        <h3>Become a Sponsor</h3>
        <div class="row 200%">
            <div class="4u 12u(medium)">

                <!-- Sidebar -->
                <div id="sidebar">
                    <section class="widget thumbnails">
                        <small><strong>Note:</strong> If you are paying for all or some of a speaker’s travel and accommodations, let us know and we will take it into account when determining your contribution level for sponsorship!</small>

                    </section>
                </div>

            </div>
            <div class="8u 12u(medium) important(medium)">

                <!-- Content -->
                <div id="content">
                    <section class="last">
                        <p>Submit the form below and we'll be in touch to talk about the right level of sponsorship for your company or organization:</p>
                        <small>*starred fields are for organizers use only and will not be displayed or distributed.</small>
                        @include('partials.errors')
                        {!! Form::open(['url' => 'sponsors/submit', 'files' => true ]) !!}
                        {{ csrf_field() }}

                        {!! Form::label('name', 'Sponsor Name') !!}
                        {!! Form::text('name', 'Awesome Company Name') !!}

                        {!! Form::label('website', 'Website') !!}
                        {!! Form::text('website', 'checkoutmysite.com') !!}

                        {!! Form::label('contact', 'Contact Name*') !!}
                        {!! Form::text('contact', 'Tessa Rocks') !!}

                        {!! Form::label('email', 'E-Mail Address*') !!}
                        {!! Form::email('email', 'example@gmail.com') !!}

                        {!! Form::label('phone', 'Phone Number*') !!}
                        {!! Form::text('phone', '(555) 867-5309') !!}

                        {!! Form::label('level', 'Desired Sponsorship Level') !!}
                        {!! Form::select('level', $availableLevels, null, ['placeholder' => 'Select desired level...']) !!}

                        {!! Form::label('desc', 'Description') !!}
                        {!! Form::textarea('desc', 'This is the text which we will make available to visitors and attendees.') !!}

                        {!! Form::submit('Submit Form') !!}
                        {!! Form::close() !!}
                    </section>
                </div>

            </div>
        </div>
    </div>
</div>