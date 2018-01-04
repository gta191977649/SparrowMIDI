<?php

namespace App\Http\Controllers;

use App\Midi;
use App\Cat;
use Illuminate\Http\Request;
use Auth;
class MidiController extends Controller
{
    //API

    //列出全部MIDI
    public function apiIndex()
    {
        return Midi::get();
    }
    //列出最新MIDI (10页面)
    public function apiIndexRecent()
    {
        return Midi::get()->take(10);
    }

    //MIDI播放页面
    public function file($id)
    {
        $midi = Midi::find($id)->get();
        return $midi ? view("midi.play") : "FAILD";
    }
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
        //return $request->all();
        if(!$request->hasFile('midi')) return back()->withErrors(array('message' => '请选择一个MIDI文件上载!'));
        
        $location = "files/uploads/user/".Auth::user()->id."/";
        $uploadMidi = $request->file('midi');
        $unique_name = "midi_".md5($uploadMidi->getClientOriginalName().time());
        
        $filename = $unique_name.".".$uploadMidi->getClientOriginalExtension();
        $uploadMidi->move($location, $filename);
        $file_url = $location.$filename;

        //处理文件
        Midi::create([
            "title" => $request['title'],
            "singer" => $request['singer'],
            "composer" => empty($request['composer']) ? "Unknown" : $request['composer'],
            "cat_id" => $request['cat'],
            "tag" => $request['tag'],
            "description" => $request['description'],
        ]);
        
    

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
