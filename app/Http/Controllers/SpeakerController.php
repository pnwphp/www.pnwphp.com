<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpeakerRequest;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Talk;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{

    public function index()
    {
        $speakers = Speaker::inRandomOrder()->get();
        return view('event.speakers')->with(['speakers' => $speakers, 'current' => 'event']);
    }

    public function getEditSpeaker()
    {
        $user = \Auth::user();
        $speaker = $user->speaker;
        $talks = $speaker->talks;

        return view('admin.form.speaker')->with([
            'speaker' => $speaker,
            'talks' => $talks,
            'content' => 'content',
            'title' => 'title',
            'sidebar' => false,
            'admin' => false,
            'layout' => 'layouts.no-sidebar',
            'url' => 'speakers/admin'
        ]);
    }

    public function postEditSpeaker(SpeakerRequest $request)
    {
        $user = \Auth::user();
        $speaker = $user->speaker();
        $speakerName = md5($request['name']);

        $data = $request->all();
        unset($data['image']);
        unset($data['_token']);

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $data['image'] = $request->image->storeAs('speakers', $speakerName.'.'.$extension, 'public');
        }

        $speaker->update($data);
        // @TODO flash success message
        return redirect()->action('SpeakerController@getEditSpeaker');
    }
}
