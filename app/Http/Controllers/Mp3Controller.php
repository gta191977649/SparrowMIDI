<?php

namespace App\Http\Controllers;

use App\Mp3;
use App\Midi;
use Illuminate\Http\Request;

class Mp3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mp3  $mp3
     * @return \Illuminate\Http\Response
     */
    public function show(Mp3 $mp3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mp3  $mp3
     * @return \Illuminate\Http\Response
     */
    public function edit(Mp3 $mp3)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mp3  $mp3
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
    
        //$midi = Midi::find($id);
        //$midi->hq->create($request->all());
       
        Mp3::create([
            "midi_id" => $id,
            "url" => $request["url"],
            "ogen" => $request["ogen"] 
        ]);
        return redirect()->route('ucp.midi.manage'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mp3  $mp3
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mp3 $mp3)
    {
        //
    }
}
