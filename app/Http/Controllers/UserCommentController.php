<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Report;


class UserCommentController extends Controller
{
   public function store(Request $request, $id)
    {
//        var_dump($_POST);return;
        // バリデーション
        $report = Report::find($id);

            $report->comments()->create([
            'user_id' => $id,
            'report_id' => $request->report_id,
            'comment' => $request->comment,
        ]);
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->uncomment($id);
        return redirect()->back();
    }
    
}
