<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\Member;
use App\Models\File;

class TeamController extends Controller
{
    public function create() {
        $team = Team::find(Auth::user()->id);
        $memberAmount = count($team->members);
        $currentDate = strtotime(date('Y-m-d'));
        $submissionStart = strtotime(date('2021-07-23'));
        $submissionEnd = strtotime(date('2021-07-30'));

        $isSubmissionDate = $currentDate >= $submissionStart && $currentDate <= $submissionEnd;
        
        return view('dashboard', ['team' => $team, 'memberAmount' => $memberAmount, 'isSubmissionDate' => $isSubmissionDate]);
    }

    public function addNewMember(Request $request) {
        $member = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'lineid' => $request->lineid,
            'phone' => $request->phone,
        ]);
        
        $member->team_id = Auth::user()->id;
        $member->save();

        $request->merge(['id' => $member->id]);

        app('App\Http\Controllers\FileController')->store($request);

        return back()
            ->with('success','Member Added')
            ->with('member', $member->name);
    }

    public function updateMember(Request $request) {
        // validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'lineid' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        // if member doesn't exist, create new
        if(!$request->id) {
            return $this->addNewMember($request);
        }

        // if member does exist, update
        $member = Member::find($request->id);
        $member->name = $request->name;
        $member->email = $request->email;
        $member->lineid = $request->lineid;
        $member->phone = $request->phone;
        $member->save();

        app('App\Http\Controllers\FileController')->store($request);

        return back()
            ->with('success','Member Updated')
            ->with('member', $member->name);
    }
}
