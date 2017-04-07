<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use App\Models\Talk;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function speakers()
    {
        $speakers = Speaker::inRandomOrder()->get();
        return view('event.speakers')->with(['speakers' => $speakers]);
    }

    public function schedule()
    {
        $days = [
            'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ];

        $schedule = [];
        foreach ($days as $day) {
            $talks = Talk::where('day', $day)->orderBy('start_time', 'ASC')->get();
            $events = Event::where('day', $day)->orderBy('start_time', 'ASC')->get();

            $talks = $this->sortByStartTime($talks, 'talks');
            $events = $this->sortByStartTime($events, 'events');

            $today = array_merge($talks, $events);
            asort($today);
            $schedule[$day] = $today;
        }
        return view('event.schedule')->with([ 'schedule' => $schedule ]);
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

    public function venue()
    {
        return view('index');
    }
}
