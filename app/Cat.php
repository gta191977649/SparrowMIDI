<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    protected $fillable = [
        'name'
    ];
    public function midis()
    {
        return $this->hasMany("App\Midi");
    }
}
