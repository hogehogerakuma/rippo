<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Report;
use App\User;
use App\Comment;

class ReportsController extends Controller
{
    
    
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reports = Report::orderBy('created_at', 'desc')->paginate(10);
           // $reports = $user->feed_reports()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'reports' => $reports,
                ];
        }
        return view('welcome', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'goal_1' => 'required',
            'result_1' => 'required',
            'object_1' => 'required',
           ]);

        $request->user()->reports()->create([
            'content' => $request->content,
            'goal_1' => $request->goal_1,
            'goal_2' => $request->goal_2,
            'goal_3' => $request->goal_3,
            'result_1' => $request->result_1,
            'result_2' => $request->result_2,
            'result_3' => $request->result_3,
            'object_1' => $request->object_1,
            'object_2' => $request->object_2,
            'object_3' => $request->object_3,
        ]);

        return redirect('/');
    }
    public function destroy($id)
    {
        $report = \App\Report::find($id);

        if (\Auth::id() === $report->user_id) {
            $report->delete();
        }

        return redirect()->back();
    }
    
    public function create()
    {
        $report = new Report;

        return view('reports.create', [
            'report' => $report,
        ]);
    }
    
    public function show($id)
    { 
        $report = Report::find($id);
        $user = $report->user;
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'user' => $user,
            'report' => $report,
            'comments' => $comments,
        ];
            
        return view('reports.show', $data);
    }
}
