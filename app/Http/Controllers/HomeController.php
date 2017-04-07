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
        return view('index')->with(['features' => $features]);
    }

    public function contact()
    {
        return view('index');
    }

    public function community()
    {
        return view('index');
    }
}
