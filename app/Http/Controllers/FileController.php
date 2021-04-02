<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use App\Models\Team;
use App\Models\Member;

class FileController extends Controller
{
    public function create() {
        return view('dashboard');
    }

    public function store(Request $request) {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);
        
        $team = Team::find(Auth::user()->id);

        $fileName = time().'_'.$request->file->getClientOriginalName();

        if($request->type == 'submission') {
            $file = File::create([
                'name' => $fileName,
                'type' => $request->type,
                'file_path' => $request->file->move(public_path('submissions'), $fileName),
            ]);
            $team->submission_file_path = $file->file_path;
            $team->save();
        } else {
            $file = File::create([
                'name' => $fileName,
                'type' => $request->type,
                'file_path' => $request->file->move(public_path('student-cards'), $fileName),
            ]);
            $member = Member::find($request->member_id);
            $member->student_card_filepath = $file->file_path;
            $member->save();
        }
        
        return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
    }

    public function download() {
        $team = Team::find(Auth::user()->id);
        $file = File::where('file_path', $team->submission_file_path)->first();

        return response()->download($file->file_path, $file->name);
    }
}
