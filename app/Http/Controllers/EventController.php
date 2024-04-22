<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function update($id, Request $request)
    {
        // 
        $event = Event::findOrFail($id);

        if ($request->act == 'plus') {
            $event->users()->attach(auth()->user()->id);
        }
        if ($request->act == 'minus') {
            $event->users()->detach(auth()->user()->id);
        }

        return redirect()->route('event.show', $id);
    }
}
