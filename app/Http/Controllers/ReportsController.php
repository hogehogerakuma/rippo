<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Report;

class ReportsController extends Controller
{
    
    
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reports = $user->feed_reports()->orderBy('created_at', 'desc')->paginate(10);
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
           ]);

        $request->user()->reports()->create([
            'content' => $request->content,
            'goal_1' => $request->goal_1,
            'goal_2' => $request->goal_2,
            'goal_3' => $request->goal_3,
            'result_1' => $request->result_1,
            'result_2' => $request->result_2,
            'result_3' => $request->result_3,
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
}
