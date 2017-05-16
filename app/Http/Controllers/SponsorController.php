<?php

namespace App\Http\Controllers;

use App\Http\Requests\SponsorRequest;
use App\Models\Sponsor;
use App\Models\User;
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
            'tier1' => Sponsor::where('level', 'platinum')
                ->where('active', true)
                ->get(),
            'tier2' => Sponsor::where('level', 'gold')
                ->where('active', true)
                ->get(),
            'tier3' => Sponsor::where('level', 'silver')
                ->where('active', true)
                ->get(),
            'tier4' => Sponsor::where('level', 'bronze')
                ->where('active', true)
                ->get(),
            'tier5' => Sponsor::where('level', 'copper')
                ->where('active', true)
                ->get(),
            'tier6' => Sponsor::where('level', 'community')
                ->where('active', true)
                ->get(),
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
        $data['active'] = false;
        unset($data['image']);
        unset($data['_token']);

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $data['image'] = $request->image->storeAs('sponsors', $sponsorName.'.'.$extension, 'public');
        }

        $sponsor = Sponsor::create($data);
        $email = $request['email'];
        $user = User::firstOrNew([ 'email' => $email ]);
        $user->name = $sponsor->contact;
        $user->save();

        $sponsor->users()->attach($user);

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
            flash("No sponsor found with id $sponsorID")->error();
            return redirect()->back();
        }
        $data = $request->all();
        unset($data['_token']);
        unset($data['sponsorID']);
        $sponsor->update($data);

        flash($sponsor['name'] . " successfully updated")->success();
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
            flash("No sponsor found with id $sponsorID")->error();
            return redirect()->back();
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
