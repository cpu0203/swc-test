<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;



class EventController extends Controller
{
    public function index()
    {
        // 
        $events = Event::all();
        return EventResource::collection($events);
    }

    public function store(EventRequest $request)
    {
        // 
        $user = $request->user();
        $event = $user->events()->create($request->validated());

        // add row to event_user table
        $event->users()->attach($request->user()->id);

        return EventResource::make($event);
    }


    public function destroy(Request $request, $id)
    {
        // 
        $event = Event::find($id);
        if ($event->user->id !== $request->user()->id) {
            return response()->json([
                'message' => 'deleting is unsuccessful',
                'code' => '200',
            ]);
        }
        $event->delete();

        return response()->json([
            'message' => 'deleting is successful',
            'code' => '200',
        ]);
    }


    public function update(Request $request, $id)
    {
        // 
        $event = Event::find($id);

        if ($request->act == 'plus') {
            $event->users()->attach($request->user()->id);
        }
        if ($request->act == 'minus') {
            $event->users()->detach($request->user()->id);
        }

        return EventResource::make($event);
    }
}
