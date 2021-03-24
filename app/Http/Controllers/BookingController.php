<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();
        return view('backend.booking.index',compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = User::where('is_admin',0)->get();
        return view('backend.booking.create',compact('team'));
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
            'date' => 'required',
            'time' => 'required',
            'user_id' => 'required',
        ]);

        $booking = new Booking();
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->user_id = $request->user_id;
        $booking->save();
        $request->session()->flash('message',"Booking Request Sent");
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
        $team = User::where('is_admin',0)->get();
        $booking = Booking::find($id);
        return view('backend.booking.edit',compact('booking','team'));
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
            'date' => 'required',
            'time' => 'required',
            'user_id' => 'required',
        ]);

        $booking = Booking::find($id);
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->user_id = $request->user_id;
        $booking->status = $request->status;
        $booking->update();
        $request->session()->flash('message',"Booking Confirmed");
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
        $booking = Booking::find($id);
        $booking->delete();
        
        return redirect()->back();
    }
}
