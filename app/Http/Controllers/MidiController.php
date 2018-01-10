<?php

namespace App\Http\Controllers;

use App\Midi;
use App\Cat;
use Illuminate\Http\Request;
use Auth;
use App\Library\MIDIAnalyzer;
use File;

class MidiController extends Controller
{
    public function midiIndex()
    {
        $midis = Midi::paginate(10);
        $cats = Cat::get();
        $total = Midi::count();
        return view("midi",compact("midis","cats","total"));
    }
    public function midiIndexCat($cat)
    {
        $midi_temp = Midi::where('cat_id',$cat);
        $total = $midi_temp->count();
        $midis = $midi_temp->paginate(10);
        $cats = Cat::get();
        return view("midi",compact("midis","cats","total"));
    }
    
    //基本信息
    public function info($fileid)
    {
        $midi = Midi::find($fileid);
        $midiAnalyzer = new MIDIAnalyzer($midi->file);
        $header = $midiAnalyzer->getHeader();
        return $header ;
    }
    //获取乐器
    public function instrument($fileid)
    {
        $midi = Midi::find($fileid);
        //return $midi;
        $midiAnalyzer = new MIDIAnalyzer($midi->file);
        $header = $midiAnalyzer->getInstrumentMap();
        return $header ;
    }
    //API
    //搜索歌手
    public function searchSinger($singer)
    {   
        $keyword = $singer;
        $midis = Midi::where("singer",'LIKE', '%'.$keyword.'%')->paginate(10);
        return view("midi.search",compact("midis","keyword"));
    }
    //搜索关键字
    public function search(Request $req)
    {   
        $midis = Midi::where("title",'LIKE', '%'.$req["keyword"].'%')->orWhere("singer",'LIKE', '%'.$req["keyword"].'%')->orWhere("tag",'LIKE', '%'.$req["keyword"].'%')->paginate(10);
        $keyword = $req["keyword"];
        return view("midi.search",compact("midis","keyword"));
    }

    //搜索标签
    public function searchTag(Request $req,$tag)
    {
        $midis = Midi::where("tag",'LIKE', '%'.$tag.'%')->paginate(10);
        $keyword = $tag;
        return view("midi.search",compact("midis","keyword"));
    }
    //搜索音源
    public function searchOngen(Request $req,$ongen)
    {
        $midis = Midi::where("ongen",'LIKE', '%'.$ongen.'%')->paginate(10);
        $keyword = $ongen;
        return view("midi.search",compact("midis","keyword"));
    }

    //搜索归类
    public function searchCat($cat)
    {
       
        $midis = Midi::where("cat_id",$cat)->paginate(10);
        $keyword = Cat::find($cat)->name;
        return view("midi.search",compact("midis","keyword"));
    }

    public function manage()
    {

        $midis = Midi::where("user_id",Auth::user()->id)->paginate(10);
        return view('ucp.midi.manage',compact("midis"));
    }
    //列出全部MIDI
    public function apiIndex()
    {
        return Midi::get();
    }
    //列出最新MIDI (10页面)
    public function apiIndexRecent()
    {
        return Midi::orderBy('created_at', 'desc')->get()->take(10);
    }

    //MIDI播放页面
    public function file($id)
    {
        $midi = Midi::find($id);
        return $midi ? view("midi.play",compact("midi")) : "FAILD";
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

    //下载文件
    public function download($id)
    {
        $midi = Midi::find($id);

        return response()->download($midi->file, $midi->title." - ".$midi->singer.".mid");
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
        Auth::user()->midis()->create([
            "title" => $request['title'],
            "singer" => $request['singer'],
            "composer" => empty($request['composer']) ? "Unknown" : $request['composer'],
            "cat_id" => $request['cat'],
            "tag" => $request['tag'],
            "ongen" => $request['ongen'],
            "description" => $request['description'],
            "file" => $file_url,
        ]);
        
        return redirect()->route("ucp");

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
    public function updateView($id)
    {
        $midi = Midi::find($id);
        $cats = Cat::get();
        return view("ucp.midi.edit",compact("midi","cats"));
    }
    public function update(Request $request, $id)
    {
        //
        $midi = Midi::find($id);
        $midi->update($request->all());
        return redirect()->route('ucp.midi.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Midi  $midi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $midi = Midi::find($id);
        //Delete File
        if(File::exists($midi->file))
            File::delete($midi->file);

        //Delete Data
        
        $midi->delete();
        return redirect()->route('ucp.midi.manage');
    }
}
