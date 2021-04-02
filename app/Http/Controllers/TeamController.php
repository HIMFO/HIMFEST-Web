<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\File;

class TeamController extends Controller
{
    public function create() {
        $team = Team::find(Auth::user()->id);
        
        return view('dashboard', ['team' => $team]);
    }
}
