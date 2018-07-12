<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Report;
use App\Comment;


class UserCommentController extends Controller
{
    public function index()
    {
        $data = [];
        
        
    }
   public function store(Request $request, $id)
    {
        $report = Report::find($id);

        $report->comments()->create([
            'user_id' => \Auth::user()->id,
            'report_id' => $request->report_id,
            'comment' => $request->comment,
        ]);
        // var_dump($id); exit;
        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = \App\Comment::find($id);
        
        if (\Auth::id() == $comment->user_id) {
            $comment->delete();
        }
             
        return redirect()->back();
    }
}