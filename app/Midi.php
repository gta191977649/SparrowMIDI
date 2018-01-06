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
        'user_id','title', 'singer', 'composer','cat_id','tag','description','file','ongen'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function cat()
    {
        return $this->belongsTo('App\Cat');
    }

    public function fileSize()
    {
        return round(filesize($this->file)*0.001,1);
    }

    public function rateStar()
    {
        $str = "";

        for($i = 0; $i < 10; $i++)
        {
            if($i < $this->rate) $str .= "<i class='fa fa-star text-warning' aria-hidden='true'></i>";
            else $str .= "<i class='fa fa-star-o text-warning' aria-hidden='true'></i>";
        }
        
        return $str;

    }
}
