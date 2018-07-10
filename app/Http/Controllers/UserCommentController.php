<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Report;


class UserCommentController extends Controller
{
   public function store(Request $request, $id)
    {
        // バリデーション

        $report = Report::find($id);

            $report->comments()->create([
            'user_id' => $request->user()->id,
            'reports_id' => $request->reports_id,
            'comments' => $request->comments,
        ]);
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->uncomment($id);
        return redirect()->back();
    }
}
