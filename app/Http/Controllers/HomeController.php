<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 
        $events = Event::all()->sortByDesc('id');
        $myEvents = Event::where('user_id', auth()->user()->id)->get();
        return view('home', compact('events', 'myEvents'));
    }


    public function show($id)
    {
        // 
        $event = Event::findOrFail($id);
        return view('event', compact('event'));
    }


    public function settings()
    {
        return view('profile');
        dd(auth()->user()->name);
    }
}
