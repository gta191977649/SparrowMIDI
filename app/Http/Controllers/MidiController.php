<?php

namespace App\Http\Controllers;

use App\Midi;
use App\Cat;
use Illuminate\Http\Request;

class MidiController extends Controller
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
    public function upload()
    {
        //
        $cats = Cat::get();
        return view("ucp.midi.upload",compact("cats"));
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
     * @param  \App\Midi  $midi
     * @return \Illuminate\Http\Response
     */
    public function show(Midi $midi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Midi  $midi
     * @return \Illuminate\Http\Response
     */
    public function edit(Midi $midi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Midi  $midi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Midi $midi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Midi  $midi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Midi $midi)
    {
        //
    }
}
