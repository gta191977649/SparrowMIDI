<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('index');
})->name('index');
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
//常规
Route::get('/midi/{id}','MidiController@file')->name("midi.file");
Route::get('/midi/dl/{id}','MidiController@download')->name("midi.file.download");

//Search
Route::get('/search/','MidiController@search')->name("search");
Route::get('/tag/{tag}','MidiController@searchTag')->name("search.tag");
Route::get('/ongen/{ongen}','MidiController@searchOngen')->name("search.ongen");
Route::get('/cat/{cat}','MidiController@searchCat')->name("search.cat");
Route::get('/artist/{cat}','MidiController@searchSinger')->name("search.singer");

//MIDI列出
Route::get('/midi/','MidiController@midiIndex')->name("midi");
Route::get('/midi/cat/{id}','MidiController@midiIndexCat')->name("midi.cat");

//系统统计
Route::get('/system/','SystemController@status')->name("status");

//API
Route::prefix('api')->group(function () {
    Route::get('/midis/search/{keyword}','MidiController@apiSearch')->name("api.midi.index");
    Route::get('/midis/index','MidiController@apiIndex')->name("api.midi.index");
    Route::get('/midis/recent/','MidiController@apiIndexRecent')->name("api.midi.recent");
    Route::get('/midis/ins/{id}','MidiController@instrument')->name("api.midi.trackInfo");
    Route::get('/midis/info/{id}','MidiController@info')->name("api.midi.info");
    

});

//UCP
Route::middleware(['auth'])->group(function () {
    //UCP
    Route::get('/ucp/','UCPController@index')->name("ucp");
    //MIDI
    Route::get('/ucp/midi/new','MidiController@upload')->name("ucp.midi.add");
    Route::post('/ucp/midi/upload','MidiController@store')->name("ucp.midi.upload");
    Route::post('/ucp/midi/update/{id}','MidiController@update')->name("ucp.midi.update.submit");
    Route::post('/ucp/midi_hq/update/{id}','Mp3Controller@update')->name("ucp.mp3.update.submit");
    Route::get('/ucp/midi/update/{id}','MidiController@updateView')->name("ucp.midi.update");
    Route::get('/ucp/midi/delete/{id}','MidiController@destroy')->name("ucp.midi.delete");
    Route::get('/ucp/midi/manage','MidiController@manage')->name("ucp.midi.manage");
});



