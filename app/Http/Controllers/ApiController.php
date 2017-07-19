<?php

namespace App\Http\Controllers;

use App\Models\Api\Event as ApiEvent;
use App\Models\Api\Presenter;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Talk;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class ApiController extends Controller {
	/**
	 * Returns an array in the same format as COD returns its data
	 * @see http://usecod.com/
	 * @param Request $request
	 * @throws MethodNotAllowedHttpException for non-GET requests
	 * @return array
	 */
	public function schedule(Request $request) {
		if($request->method() != 'GET') {
			throw new MethodNotAllowedHttpException(['GET']);
		}

		$output = [];

		Talk::leftJoin('speakers', '');
		foreach(Talk::get() as $talk) {
			$event = new ApiEvent();
			$event->id = "t{$talk->id}";
			$event->title = $talk->name;
			$event->abstract = $talk->desc;
			$event->type = $talk->designation;
			$event->category = self::getCategory($talk);
			$event->session_type = ucfirst($talk->designation);
			$event->experience_level = $talk->level;
			$event->room = $this->getRoom($talk);
			$event->date = $talk->getDate();
			$event->start = $talk->getDate() . ' ' . self::formatTime($talk->start_time);
			$event->end = $talk->getDate() . ' ' . self::formatTime($talk->end_time);
			foreach($talk->speakers as $speaker) {
				$parts = explode(' (@', $speaker->name);
				$presenter = new Presenter();
				$presenter->id = $speaker->id;
				$presenter->fullname = $parts[0];
				if(count($parts) >  1) {
					$presenter->twitter = rtrim($parts[1], ')');
				}
				$presenter->bio = $speaker->desc;
				$presenter->picture = asset("storage/{$speaker->image}");
				$event->presenter[] = $presenter;
			}
			$output[] = $event;
		}

		foreach(Event::get() as $evt) {
			$event = new ApiEvent();
			$event->id = "e{$evt->id}";
			$event->title = $evt->name;
			$event->abstract = $evt->desc;
			$event->room = $evt->location;
			$event->category = self::getCategory($evt);
			$event->date = $evt->getDate();
			$event->start = $evt->getDate() . ' ' . self::formatTime($evt->start_time);
			$event->end = $evt->getDate() . ' ' . self::formatTime($evt->end_time);
			$output[] = $event;
		}

		$output = array_unique($output);

		usort($output, function(ApiEvent $a, ApiEvent $b) {
			return strtotime($a->start) <=> strtotime($b->start);
		});

		return $output;
	}

	/**
	 * @param Talk|Event $obj
	 * @return string
	 */
	private static function getCategory($obj) : string {
		return date('M d D', strtotime($obj->getDate()));
	}

	/**
	 * @param Talk $talk
	 * @return string
	 */
	private function getRoom(Talk $talk) : string {
		if(preg_match('/Thursday Room (\d+)/', $this->days[$talk->day], $matches)) {
			return "Johnson Hall room {$matches[1]}";
		}
		if($this->days[$talk->day] == 'Friday' || $this->days[$talk->day] == 'Saturday') {
			return 'Kane Hall room 220';
		}
		return '';
	}

	/**
	 * @param String $string
	 * @return string
	 */
	private static function formatTime(String $string) : string {
		$parts = explode(':', $string);
		return date('H:i', mktime($parts[0], $parts[1]));
	}
}
