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

//API
Route::prefix('api')->group(function () {
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
});



