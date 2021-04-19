<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('backend.player.index',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('is_admin',0)->get();
        return view('backend.player.create',compact('users'));
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
            'name' => 'required',
            'position' => 'required',
            'user_id' => 'required',
        ]);

        $player = new Player();
        $player->name = $request->name;
        $player->position = $request->position;
        $player->user_id = $request->user_id;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('players',$newName);
            $player->image = 'players/' . $newName;
        }else{
            $player->image = 'images/profile.jpg';
        }

        $player->save();

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
        $users = User::where('is_admin',0)->get();
        $player = Player::find($id);
        return view('backend.player.edit',compact('player','users'));
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
            'name' => 'required',
            'position' => 'required',
            'user_id' => 'required',
        ]);

        $player = Player::find($id);
        $player->name = $request->name;
        $player->position = $request->position;
        $player->user_id = $request->user_id;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('players',$newName);
            $player->image = 'players/' . $newName;
        }else{
            $player->image = 'images/profile.jpg';
        }

        $player->update();

        $request->session()->flash('message','Record Updated');
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
