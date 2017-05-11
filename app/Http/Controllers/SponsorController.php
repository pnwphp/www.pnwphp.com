<?php

namespace App\Http\Controllers;

use App\Http\Requests\SponsorRequest;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function __construct()
    {
        \View::share('current', 'sponsors');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = [
            'tier1' => Sponsor::where('level', 'platinum')->get(),
            'tier2' => Sponsor::where('level', 'gold')->get(),
            'tier3' => Sponsor::where('level', 'silver')->get(),
            'tier4' => Sponsor::where('level', 'bronze')->get(),
            'tier5' => Sponsor::where('level', 'copper')->get(),
            'tier6' => Sponsor::where('level', 'community')->get()
        ];


        return view('sponsors.index')->with([
            'sponsors' => $sponsors,
            'availableLevels' => $this->availableLevels
        ]);
    }

    public function postNewSponsorForm(SponsorRequest $request)
    {
        $sponsorName = md5($request['name']);
        $data = $request->all();
        unset($data['image']);
        unset($data['_token']);

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $data['image'] = $request->image->storeAs('sponsors', $sponsorName.'.'.$extension, 'public');
        }

        $sponsor = Sponsor::create($data);
        $email = $request['email'];
        $user = firstOrNew([ 'email' => $email ]);
        $user->name = $sponsor->contact;
        $sponsor->attach($user);
        $user->save();

        return view('sponsors.welcome');
    }

    public function getNewSponsorForm()
    {
        return view('sponsors.new')->with('availableLevels', $this->availableLevels);
    }

    public function postEditSponsor(SponsorRequest $request)
    {
        $sponsorID = $request['sponsorID'];

        $user = \Auth::user();
        $sponsor = $user->sponsors()->where('id', $sponsorID);
        if (!$sponsor) {
            // @TODO error handling
        }
        $data = $request->all();
        unset($data['_token']);
        unset($data['sponsorID']);
        $sponsor->update($data);

        // @TODO flash success message
        return redirect()->action('SponsorController@getEditSponsor');
    }

    public function getEditSponsor($sponsorID = null)
    {
        $user = \Auth::user();
        if ($sponsorID == null) {
            $sponsors = $user->sponsors;
            if (count($sponsors) > 1) {
                return view('sponsors.select')->with('sponsors', $sponsors);
            }
            $sponsorID = $user->sponsors()->first()->id;
        }
        $sponsor = $user->sponsors()->where('sponsor_id', $sponsorID)->first();
        if (!$sponsor) {
            // @TODO error handling
        }
        return view('admin.form.sponsor')->with([
            'sponsor' => $sponsor,
            'content' => 'content',
            'title' => 'title',
            'sidebar' => false,
            'admin' => false,
            'availableLevels' => $this->availableLevels,
            'layout' => 'layouts.no-sidebar',
            'url' => 'sponsors/admin'
        ]);
    }
}
