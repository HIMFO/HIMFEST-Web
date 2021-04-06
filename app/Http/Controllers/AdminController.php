<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Member;

class AdminController extends Controller
{
    public function create() {
        $team = Team::get();
        $member = Member::get();

        return view('admin.dashboard', ['member'=>$member,'team'=>$team]);
    }
}
