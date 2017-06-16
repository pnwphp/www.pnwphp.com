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
            flash("Unable to locate a sponsor with id $sponsorID")->error();
            \Log::debug("Unable to locate a sponsor with id $sponsorID");
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
        $sponsorID = $data['sponsorID'];
        unset($data['_token']);
        unset($data['image']);
        unset($data['sponsorID']);
        // @TODO fix form / request processing so these shenanigans aren't needed in the controller
        if (array_key_exists('active', $data)) {
            if ($data['active'] == 'on') {
                $data['active'] = true;
            }
        } else {
            $data['active'] = false;
        }

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $data['image'] = $request->image->storeAs('sponsors', $sponsorName.'.'.$extension, 'public');
        }

        $sponsor = Sponsor::find($request['sponsorID']);
        if ($sponsor) {
            $sponsor->update($data);
            flash($sponsor['name'] . " sponsor successfully updated")->success();
        } else {
            $sponsor = Sponsor::create($data);
            $sponsorID = $sponsor->id;
            flash($sponsor['name'] . " sponsor successfully created")->success();
        }

        return redirect()->action('AdminController@getSponsor', [ 'sponsorID' => $sponsorID ]);
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

        flash($user['name'] . " successfully associated with sponsor " . $sponsor['name'])->success();
        return redirect()->action('AdminController@getSponsor', [ 'sponsorID' => $request['sponsorID'] ]);
    }

    public function removeUserFromSponsor(Request $request)
    {
        $user = User::find($request['userID']);
        $sponsor = Sponsor::find($request['sponsorID']);
        $sponsor->users()->detach($user);

        flash($user['name'] . " no longer has access to sponsor " . $sponsor['name'])->success();
        return redirect()->action('AdminController@getSponsor', [ 'sponsorID' => $request['sponsorID'] ]);
    }

    public function deleteSponsor(Request $request)
    {
        $sponsor = Sponsor::find($request['sponsorID']);
        $name = $sponsor->name;
        $sponsor->delete();

        flash($name . " sponsor has been deleted")->success();
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
            flash("No talk found with id $talkID")->error();
            return redirect()->back();
        }
        return view('admin.form.talk')->with([
            'talk' => $talk,
            'talkLevels' => $this->talkLevels,
            'talkCategories' => $this->talkCategories,
            'talkDays' => $this->days,
            'talkDesignations' => $this->designations
        ]);
    }

    public function postTalk(TalkRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['talkID']);
        if ($request['talkID'] == 'new') {
            $talk = Talk::create($data);
            flash($talk['name'] . " talk successfully created")->success();
        } else {
            $talk = Talk::find($request['talkID'])->update($data);
            flash($talk['name'] . " talk successfully updated")->success();
        }

        return redirect()->action('AdminController@getTalk', [ 'talkID' => $talk->id ]);
    }

    public function addSpeakerToTalk(Request $request)
    {
        $speaker = Speaker::findOrFail($request['speaker']);
        $talk = Talk::findOrFail($request['talkID']);

        $talkSpeaker = $talk->speakers()->where('speaker_id', $speaker->id)->first();
        if (!$talkSpeaker) {
            $talk->speakers()->save($speaker);
            flash($speaker['name'] . " successfully associated with talk " . $talk['name'])->success();
        } else {
            flash($speaker['name'] . " is associated with talk " . $talk['name'])->success();
        }

        return redirect()->action('AdminController@getTalk', [ 'talkID' => $request['talkID'] ]);
    }

    public function removeSpeakerFromTalk(Request $request)
    {
        $speaker = Speaker::find($request['speakerID']);
        $talk = Talk::find($request['talkID']);
        $talk->speakers()->detach($speaker);

        flash($speaker['name'] . " no longer has access to talk " . $talk['name'])->success();
        return redirect()->action('AdminController@getTalk', [ 'talkID' => $request['talkID'] ]);
    }

    public function deleteTalk(Request $request)
    {
        $talk = Talk::find($request['talkID']);
        $name = $talk->name;
        $talk->delete();

        flash($name . " talk has been successfully deleted")->success();
        return redirect()->action('AdminController@index');
    }

    public function newTalk()
    {
        return view('admin.form.new.talk')->with([
            'talkLevels' => $this->talkLevels,
            'talkCategories' => $this->talkCategories,
            'talkDays' => $this->days,
            'talkDesignations' => $this->designations
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
            flash("No speaker found with id $speakerID")->error();
            return redirect()->back();
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
            $user->speaker()->save($speaker);
            $user->save();

            flash($speaker['name'] . " speaker has been successfully created")->success();
        } else {
            $speaker = Speaker::find($request['speakerID'])->update($data);
            flash($speaker['name'] . " has been successfully updated")->success();
        }

        return redirect()->action('AdminController@getSpeaker', [ 'speakerID' => $speaker->id ]);
    }

    public function addUserToSpeaker(Request $request)
    {
        $speaker = Speaker::findOrFail($request['speakerID']);

        $user = User::firstOrNew([
            'email' => $request['email']
        ]);
        $user->name = $speaker->name;
        $user->speaker()->save($speaker);
        $user->save();

        flash($user['name'] . " user successfully associated with this speaker")->success();
        return redirect()->action('AdminController@getSpeaker', [ 'speakerID' => $request['speakerID'] ]);
    }

    public function addTalkToSpeaker(Request $request)
    {
        $talk = Talk::find($request['talkID']);
        $speaker = Speaker::find($request['speakerID']);
        $speaker->talks()->attach($talk);

        flash($talk['name'] . " successfully associated with speaker " . $speaker['name'])->success();
        return redirect()->action('AdminController@getSpeaker', [ 'speakerID' => $request['speakerID'] ]);
    }

    public function removeTalkFromSpeaker(Request $request)
    {
        $talk = Talk::find($request['talkID']);
        $speaker = Speaker::find($request['speakerID']);
        $speaker->talks()->detach($talk);

        flash($speaker['name'] . " successfully removed from talk " . $talk['name'])->success();
        return redirect()->action('AdminController@getSpeaker', [ 'speakerID' => $request['speakerID'] ]);
    }

    public function deleteSpeaker(Request $request)
    {
        $speaker = Speaker::find($request['speakerID']);
        $name = $speaker->name;
        $speaker->delete();

        flash($name . " speaker has been deleted")->success();
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
            flash("No event found with id $eventID")->error();
            return redirect()->back();
        }
        return view('admin.form.event')->with([
            'event' => $event,
            'eventDays' => $this->days
        ]);
    }

    public function postEvent(EventRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['eventID']);
        unset($data['image']);

        $event = Event::find($request['eventID']);
        if ($event) {
            $event->update($data);
            flash($event['name'] . " event successfully updated")->success();
        } else {
            $event = Event::create($data);
            flash($event['name'] . " event successfully created")->success();
        }

        return view('admin.form.event')->with(['event' => $event, 'eventDays' => $this->days]);
    }

    public function deleteEvent(Request $request)
    {
        $event = Event::find($request['eventID']);
        $name = $event->name;
        $event->delete();

        flash($name . " has been deleted")->success();
        return view('admin.index');
    }

    public function newEvent()
    {
        return view('admin.form.new.event')->with('eventDays', $this->days);
    }
}
