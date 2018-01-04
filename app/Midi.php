<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Midi extends Model
{
    //
    /*
          "title" => $request['title'],
            "singer" => $request['singer'],
            "composer" => $request['composer'],
            "cat" => $request['cat'],
            "tag" => $request['tag'],
            "description" => $request['description'],
    */
    protected $fillable = [
        'user_id','title', 'singer', 'composer','cat_id','tag','description','file'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function cat()
    {
        return $this->belongsTo('App\Cat');
    }

}
