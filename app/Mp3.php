<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mp3 extends Model
{
    /*
        $table->increments('id');
        $table->text('url');
        $table->text('ogen');
        $table->integer('midi_id');
    */

    protected $fillable =
    [
        'url','ogen', 'midi_id'
    ];

    public function midi()
    {
        return $this->belongsTo("App\Midi");
    }
}
