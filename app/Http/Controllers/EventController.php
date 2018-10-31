<?php

namespace App\Http\Controllers;

use App\Event;
use App\Filters\EventFilter;
use App\Http\Resources\EventResource;
use App\Http\Requests\EventStore;
use App\Http\Requests\EventUpdate;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = EventFilter::apply($request);
        return EventResource::collection($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStore $request)
    {
        // TODO Rename event banner

        $data = array_merge($request->all(), [
            'user_id' => $request->user()->id,
            'tag' => substr(md5(microtime()), 0, 5),
            'status' => 1,
        ]);

        $event = Event::create($data);

        return new EventResource($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdate $request, Event $event)
    {
        if ($event->update($request->all())) {
            return new EventResource($event);
        }
        return response()->json([
            'errors' => ['message' => 'Event was not updated successfully']
        ], 520);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if ($event->delete()) {
            return response(null, 204);
        }
        return response()->json([
            'errors' => ['message' => 'Event deletion was unsuccessfully']
        ], 520);
    }
}
