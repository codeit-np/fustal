<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('backend.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tiesheet_date' => 'required',
            'lastentry_date' => 'required',
            'organiser' => 'required',
            'contact' => 'required',
            'image' => 'required',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->tiesheet_date = $request->tiesheet_date;
        $event->lastentry_date = $request->lastentry_date;
        $event->venue = $request->venue;
        $event->organiser = $request->organiser;
        $event->contact = $request->contact;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('events',$newName);
            $event->image = 'events/' . $newName;
        }
        $event->save();

        $request->session()->flash('message','Record Saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fustalevent = Event::find($id);
        return view('backend.event.edit',compact('fustalevent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tiesheet_date' => 'required',
            'lastentry_date' => 'required',
            'organiser' => 'required',
            'contact' => 'required',
        ]);

        $event =Event::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->tiesheet_date = $request->tiesheet_date;
        $event->lastentry_date = $request->lastentry_date;
        $event->venue = $request->venue;
        $event->organiser = $request->organiser;
        $event->contact = $request->contact;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('events',$newName);
            $event->image = 'events/' . $newName;
        }
        $event->save();

        $request->session()->flash('message','Record Saved');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
