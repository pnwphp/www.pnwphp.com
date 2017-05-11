<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Requests\SpeakerRequest;
use App\Http\Requests\SponsorRequest;
use App\Http\Requests\TalkRequest;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\Talk;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // info for admin sidebar
        $sponsor = new Sponsor();
        $speaker = new Speaker();
        $talk = new Talk();
        $event = new Event();
        $sponsors = $sponsor->getActive();
        $pendingSponsors = $sponsor->getPending();
        $speakers = $speaker->getSimpleArray();
        $talks = $talk->getSimpleArray();
        $events = $event->getSimpleArray();
        // for form structure
        $title = 'main-title';
        $content = 'main-content';
        $sidebar = true;
        $layout = 'layouts.left-sidebar';
        \View::share([
            'sponsors'=>$sponsors,
            'pendingSponsors'=>$pendingSponsors,
            'speakers'=>$speakers,
            'talks'=>$talks,
            'events'=>$events,
            'title' => $title,
            'content' => $content,
            'sidebar' => $sidebar,
            'layout' => $layout,
            'admin' => true
        ]);
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /*
     * ADMIN SPONSORS
     */
    public function getSponsor($sponsorID)
    {
        $sponsor = Sponsor::find($sponsorID);

        if (!$sponsor) {
            // @TODO error handling
            flash("Unable to locate a sponsor with id $sponsorID", "error");
        }

        return view('admin.form.sponsor')->with([
            'sponsor' => $sponsor,
            'url' => 'admin/sponsor',
            'availableLevels' => $this->availableLevels
        ]);
    }

    public function postSponsor(SponsorRequest $request)
    {
        $sponsorName = md5($request['name']);
        $data = $request->all();
        unset($data['_token']);
        unset($data['image']);
        unset($data['sponsorID']);

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $data['image'] = $request->image->storeAs('sponsors', $sponsorName.'.'.$extension, 'public');
        }

        $sponsor = Sponsor::find($request['sponsorID']);
        if ($sponsor) {
            $sponsor->update($data);
        } else {
            Sponsor::create($data);
        }

        // @TODO flash message
        return redirect()->action('AdminController@getSponsor', [ 'sponsorID' => $request['sponsorID'] ]);
    }

    public function addUserToSponsor(Request $request)
    {
        $user = User::firstOrNew([
            'email' => $request['email']
        ]);
        $user->name = $request['name'];
        $user->save();
        $sponsor = Sponsor::find($request['sponsorID']);

        if (empty($sponsor->users()->find($user->id))) {
            $sponsor->users()->attach($user);
        }

        // @TODO flash message
        return redirect()->action('AdminController@getSponsor', [ 'sponsorID' => $request['sponsorID'] ]);
    }

    public function removeUserFromSponsor(Request $request)
    {
        $user = User::find($request['userID']);
        $sponsor = Sponsor::find($request['sponsorID']);
        $sponsor->users()->detach($user);

        // @TODO flash message

        return redirect()->action('AdminController@getSponsor', [ 'sponsorID' => $request['sponsorID'] ]);
    }

    public function deleteSponsor(Request $request)
    {
        $sponsor = Sponsor::find($request['sponsorID']);
        $sponsor->delete();

        // @TODO flash message
        return redirect()->action('AdminController@index');
    }

    public function newSponsor()
    {
        return view('admin.form.new.sponsor');
    }


    /*
     * ADMIN TALKS
     */
    // @TODO - integrate with open CFP to auto-import selected talk / speaker info
    public function getTalk($talkID)
    {
        $talk = Talk::find($talkID);

        if (!$talk) {
            // @TODO error handling
        }
        return view('admin.form.talk')->with([
            'talk' => $talk,
            'talkLevels' => $this->talkLevels,
            'talkCategories' => $this->talkCategories,
            'talkDays' => $this->days
        ]);
    }

    public function postTalk(TalkRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['talkID']);
        if ($request['talkID'] == 'new') {
            Talk::create($data);
        } else {
            Talk::find($request['talkID'])->update($data);
        }

        // @TODO flash message
        return redirect()->action('AdminController@getTalk', [ 'talkID' => $request['talkID'] ]);
    }

    public function addSpeakerToTalk(Request $request)
    {
        $speaker = Speaker::find($request['speakerID']);
        $talk = Talk::find($request['talkID']);

        if (empty($talk->speakers()->find($speaker->id))) {
            $talk->speakers()->attach($speaker);
        }

        // @TODO flash message
        return redirect()->action('AdminController@getTalk', [ 'talkID' => $request['talkID'] ]);
    }

    public function removeSpeakerFromTalk(Request $request)
    {
        $speaker = Speaker::find($request['speakerID']);
        $talk = Talk::find($request['talkID']);
        $talk->speakers()->detach($speaker);

        // @TODO flash message
        return redirect()->action('AdminController@getTalk', [ 'talkID' => $request['talkID'] ]);
    }

    public function deleteTalk(Request $request)
    {
        $talk = Talk::find($request['talkID']);
        $talk->delete();

        // @TODO flash message
        return redirect()->action('AdminController@index');
    }

    public function newTalk()
    {
        return view('admin.form.new.talk')->with([
            'talkLevels' => $this->talkLevels,
            'talkCategories' => $this->talkCategories,
            'days' => $this->days
        ]);
    }


    /*
     * ADMIN SPEAKERS
     */
    // @TODO - integrate with open CFP to auto-import selected talk / speaker info
    public function getSpeaker($speakerID)
    {
        $speaker = Speaker::find($speakerID);
        if (!$speaker) {
            // @TODO error handling
        }
        return view('admin.form.speaker')->with([
            'speaker' => $speaker,
            'url' => 'admin/speaker'
        ]);
    }

    public function postSpeaker(SpeakerRequest $request)
    {
        $data = $request->all();
        $speakerName = md5($request['name']);
        unset($data['_token']);
        unset($data['speakerID']);
        unset($data['image']);

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $data['image'] = $request->image->storeAs('speakers', $speakerName.'.'.$extension, 'public');
        }

        if ($request['speakerID'] == 'new') {
            unset($data['email']);
            $speaker = Speaker::create($data);
            $user = User::firstOrNew([ 'email' => $request['email'] ]);
            $user->name = $speaker->name;
            $user->speaker()->associate($speaker);
            $user->save();
        } else {
            Speaker::find($request['speakerID'])->update($data);
        }

        // @TODO flash message
        return redirect()->action('AdminController@getSpeaker', [ 'speakerID' => $request['speakerID'] ]);
    }

    public function addUserToSpeaker(Request $request)
    {
        $speaker = Speaker::find($request['speakerID']);
        $user = User::firstOrNew([
            'email' => $request['email']
        ]);
        $user->name($speaker->name);
        $user->speaker()->associate($speaker);
        $user->save();

        // @TODO flash message
        return redirect()->action('AdminController@getSpeaker', [ 'speakerID' => $request['speakerID'] ]);
    }

    public function addTalkToSpeaker(Request $request)
    {
        $talk = Talk::find($request['talkID']);
        $speaker = Speaker::find($request['speakerID']);
        $speaker->talks()->attach($talk);

        // @TODO flash message
        return redirect()->action('AdminController@getSpeaker', [ 'speakerID' => $request['speakerID'] ]);
    }

    public function removeTalkFromSpeaker(Request $request)
    {
        $talk = Talk::find($request['talkID']);
        $speaker = Speaker::find($request['speakerID']);
        $speaker->talks()->detach($talk);

        // @TODO flash message
        return redirect()->action('AdminController@getSpeaker', [ 'speakerID' => $request['speakerID'] ]);
    }

    public function deleteSpeaker(Request $request)
    {
        $speaker = Speaker::find($request['speakerID']);
        $speaker->delete();

        // @TODO flash message
        return view('admin.index');
    }

    public function newSpeaker()
    {
        return view('admin.form.new.speaker');
    }


    /*
     * ADMIN EVENTS
     */
    public function getEvent($eventID)
    {
        $event = Event::find($eventID);
        if (!$event) {
            // @TODO error handling
        }
        return view('admin.form.event')->with([
            'event' => $event,
            'eventDays' => $this->days
        ]);
    }

    public function postEvent(EventRequest $request)
    {
        $event = Event::updateOrCreate($request->all());

        // @TODO flash message
        return view('admin.form.event')->with('event', $event);
    }

    public function deleteEvent(Request $request)
    {
        $event = Event::find($request['eventID']);
        $event->delete();

        // @TODO flash message
        return view('admin.index');
    }

    public function newEvent()
    {
        return view('admin.form.new.event')->with('eventDays', $this->days);
    }
}
