<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contacted;
use App\Models\ContactForm;
use App\Models\Sponsor;
use App\Models\Talk;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // random Speakers
        // image, name, desc
        $features = Talk::inRandomOrder()->take(8)->get();
        $sponsors = Sponsor::getActiveGroupedByTier();
        return view('index')->with([
            'features' => $features,
            'current' => 'welcome',
            'sponsors' => $sponsors
        ]);
    }

    public function getContact($subject = "PNWPHP Conference")
    {
        return view('contact')->with(['subject' => $subject, 'current' => 'contact']);
    }

    public function postContact(ContactRequest $request)
    {
        $message = new Contacted($request->except('_token'));

        try {
            Mail::to(config('app.email'))->send($message);
            flash("Your message has been sent! Thank you!")->success();
        } catch(\Exception $e) {
            var_dump($e);
            flash("We were unable to send your message:" . $e->getMessage())->error();
        }

        return redirect()->action('HomeController@getContact')->with('subject', $request['subject']);
    }

    public function home()
    {
        if (!\Auth::check()) {
            return redirect()->action('HomeController@index');
        }
        if (\Auth::user()->isAdmin()) {
            return redirect()->action('AdminController@index');
        }

        if (\Auth::user()->hasRole('sponsor')) {
            return redirect()->action('SponsorController@getEditSponsor');
        }

        if (\Auth::user()->hasRole('speaker')) {
            return redirect()->action('SpeakerController@getEditSpeaker');
        }

        return redirect()->action('HomeController@index');
    }

    public function postEditSpeaker($speakerID)
    {

    }

    public function getEditSpeaker($speakerID = null)
    {

    }
}
