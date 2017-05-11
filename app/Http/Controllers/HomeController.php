<?php

namespace App\Http\Controllers;

use App\Models\Talk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 3 random Speakers
        // image, name, desc
        $features = Talk::inRandomOrder()->take(3)->get();
        return view('index')->with(['features' => $features, 'current' => 'welcome']);
    }

    public function contact()
    {
        return view('index');
    }

    public function home()
    {
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
