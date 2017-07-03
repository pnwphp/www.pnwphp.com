<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Talk;

class EventController extends Controller
{
    public function __construct()
    {
        \View::share('current', 'event');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function schedule()
    {
        $days = $this->days;

        $schedule = [];
        foreach ($days as $day => $name) {
            $talks = Talk::where('day', $day)->orderBy('start_time', 'ASC')->get();
            $events = Event::where('day', $day)->orderBy('start_time', 'ASC')->get();

            $talks = $this->sortByStartTime($talks, 'talks');
            $events = $this->sortByStartTime($events, 'events');

            $today = array_merge($talks, $events);
            asort($today);
            $schedule[$name] = $today;
        }
        return view('event.schedule')->with([ 'schedule' => $schedule ]);
    }

    public function venue()
    {
        return view('event.venue');
    }

    public function venueAlbum()
    {
        $images = $this->getVenueImages();
        return view('event.venue-album')->with([ 'images' => $images ]);
    }

    public function hotel()
    {
        $image = 'images/hotel.jpg';
        return view('event.hotel')->with([ 'image' => $image ]);
    }

	public function gettingHere()
	{
		return view('event.getting-here');
	}

    public function sortByStartTime($timeSlots, $label)
    {
        $sorted = [];
        foreach ($timeSlots as $slot) {
            $key = str_replace(':', '', $slot->start_time);
            $sorted[$key.$label.$slot->id] = $slot;
        }
        asort($sorted);
        return $sorted;
    }

    // @TODO replace this function with a db table for images and alt text
    // include adding, removing, and altering image data part of the admin features
    public function getVenueImages()
    {
        return [
            0 => [
                'image' => 'images/venue/kane_hall.jpg',
                'alt' => 'Kane Hall building from across a brick paved courtyard and set against clear blue sky.  Building front consists of 10 columns.  The height of the hall is angled with the higher side on the right in the image.  To the left of the building is a tower.'
                ],
            'freespace' => [
                'image' => 'images/venue/freespace.jpg',
                'alt' => "Kane Hall building interior open area outside the auditorium. This is where you will find event refreshments, organizers, and vendor booths. There will also be space here to take rest breaks from talks and indulge with others in the 'hallway track'."
            ],
            'vending' => [
                'image' => 'images/venue/vending.jpg',
                'alt' => "Vending machines in the open area, in case you'd like to supplement event refreshments."
            ],
            1 => [
                'image' => 'images/venue/auditorium1.jpg',
                'alt' => "Kane Hall's 120 auditorium interior from several steps behind the speaker's podium in the lower right of the frame and focused across and up the 440 empty seats to the opposite corner."
            ],
            2 => [
                'image' => 'images/venue/auditorium2.jpg',
                'alt' => "Auditorium interior from the lower left of the frame and focused across and up the 440 empty seats to the opposite corner.  Clear areas are seen between the fixed seats of the first row to accommodate those with mobility assisting devices."
            ],
            3 => [
                'image' => 'images/venue/auditorium3.jpg',
                'alt' => "Aauditorium interior from immediately behind the speaker's podium in the lower right of the frame and focused across and up the 440 empty seats to the opposite corner.  The podium's monitor, cables port, and microphone are visible."
            ],
            4 => [
                'image' => 'images/venue/auditorium4.jpg',
                'alt' => "Auditorium interior from behind the back row on the right side facing the stage and focused across and down the 440 empty seats to the opposite corner where the speaker podium is located.  The large screen behind the center of the presentation area is clearly visible as are the small desk tables on the site of each seat which could be drawn up and pulled across the lap of a person seated there."
            ],
            5 => [
                'image' => 'images/venue/auditorium5.jpg',
                'alt' => "Auditorium interior from behind the back row on the left side facing the stage and focused across and down the 440 empty seats to the opposite corner. The large screen behind the center of the presentation area is clearly visible as are the small desk tables on the site of each seat which could be drawn up and pulled across the lap of a person seated there."
            ],
            6 => [
                'image' => 'images/venue/auditorium6.jpg',
                'alt' => "Auditorium interior from behind the back row in the center and focused across and down the 440 empty seats to the large screen behind the center of the presentation area."
            ],
            7 => [
                'image' => 'images/venue/auditorium7.jpg',
                'alt' => "Auditorium interior from the center of the presentation area and focused up the 440 empty seats to the read wall of the auditorium."
            ]
        ];
    }
}
