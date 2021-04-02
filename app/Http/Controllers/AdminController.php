<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class AdminController extends Controller
{
    public function create() {
        $teams = Team::get();

        return view('admin.dashboard', ['teams' => $teams]);
    }
}
