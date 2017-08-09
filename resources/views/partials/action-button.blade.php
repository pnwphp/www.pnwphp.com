@if(config('app.registration') && !config('app.soldout'))
    <li><a href="{{ config('app.registration_url') }}" target="_blank" rel="noopener noreferrer" class="button">Get Your Ticket</a></li>
@endif
@if(config('app.cfp'))
    <li><a href="#" class="button">Submit a Talk <i class="fa fa-microphone"></i></a></li>
@endif
@if(!config('app.registration'))
    <li><a href="#" class="button disabled">Registration Opens June 1st</a></li>
@endif
@if(config('app.soldout'))
    <li><a href="#" class="button disabled">Sold Out!</a></li>
@endif
@if(config('app.diversity_tickets'))
    <li><a href="{{ config('app.diversity_tickets_url') }}" target="_blank" rel="noopener noreferrer" class="button button-green">Request a Diversity Ticket</a></li>
@endif