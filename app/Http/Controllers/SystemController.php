<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Midi;
use App\User;
class SystemController extends Controller
{
    //
    public function status()
    {
        $midis = Midi::get();
        $users = User::get();
        return view("system.status",compact("midis","users"));
    }
}
