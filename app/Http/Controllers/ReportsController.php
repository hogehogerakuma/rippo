<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Report;
use App\User;
use App\Comment;
use DateTime;

class ReportsController extends Controller
{
     
    
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            date_default_timezone_set('Asia/Tokyo');
            
            $user = \Auth::user();
            $targetTable = DB::table('reports')->get();
            // foreach($targetTable as $targeteach)
            // {
            //     $thatday_date = DateTime::createFromFormat('Y-m-d H:i:s', $targeteach->created_at)->format('d');
            //     // thatday_dateをもったレポートをいいねしてくれた人を表示する？
            //     $favoriters = DB::table('user_favorite')
            //     ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
            //     ->join('users', 'users.id', '=', 'user_favorite.user_id')
            //     ->whereDay('reports.created_at' ,$thatday_date)
            //     ->select('users.username')
            //     ->get();
            //     $targeteach->favCnt = count($favoriters);
            // }
            // dd($favo_counter); exit;
            $reports = Report::orderBy('created_at', 'desc')->paginate(10);
            foreach($reports as $report)
            {
                $thatday_date = DateTime::createFromFormat('Y-m-d H:i:s', $report->created_at)->format('d');
                // thatday_dateをもったレポートをいいねしてくれた人を表示する？
                $favoriters = DB::table('user_favorite')
                ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
                ->join('users', 'users.id', '=', 'user_favorite.user_id')
                ->whereDay('reports.created_at' ,$thatday_date)
                ->select('users.username')
                ->get();
                $report->favCnt = count($favoriters);
            }
            $data = [
                'user' => $user,
                'reports' => $reports,
                'favoriters' => $favoriters,
                'thatday_date' => $thatday_date,
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
        $user = \Auth::user();
        $report = new Report;
        
        $data = [
            'user' => $user,
            'report' => $report,
            ];

        return view('reports.create', $data);
    }
    
    public function reportsFromUser($id) {
         
        $user = User::find($id);
        $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
        
        $day = date("y/m/d");
        $week = date("y/m/d", strtotime("-1 week"));
        $month = date("y/m/d", strtotime("-1 month"));
        
        $graph_data = [
            ['Date', 'Favorites', 'Followings', 'Followers'],
        ];
    
        $searches = [$day, $week, $month];
        foreach ($searches as $value) {
            $favorites = $user-> favorites()->where('user_favorite.created_at', '>', $value)->get()->count();
            $followings = $user->followings()->where('user_follow.created_at', '>', $value)->get()->count();
            $followers = $user->followers()->where('user_follow.created_at', '>', $value)->get()->count();

            $graph_data = array_merge($graph_data, [[$value, $favorites, $followings, $followers]]);
        }

        $data = [
            'user' => $user,
            'reports' => $reports,
            'graph_data' => $graph_data,
            'comments' => $comments,
        ];

        
        // $data += $this->counts($user);
        return view('users.reports', $data);
    }

// public function commentsFromUser($id) {
         
//       $user = User::find($id);
//         $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
//         $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
        
//         $day = date("y/m/d");
//         $week = date("y/m/d", strtotime("-1 week"));
//         $month = date("y/m/d", strtotime("-1 month"));
        
//         $graph_data = [
//             ['Date', 'Favorites', 'Followings', 'Followers'],
//         ];
    
//         $searches = [$day, $week, $month];
//         foreach ($searches as $value) {
//             $favorites = $user-> favorites()->where('user_favorite.created_at', '>', $value)->get()->count();
//             $followings = $user->followings()->where('user_follow.created_at', '>', $value)->get()->count();
//             $followers = $user->followers()->where('user_follow.created_at', '>', $value)->get()->count();

//             $graph_data = array_merge($graph_data, [[$value, $favorites, $followings, $followers]]);
//         }

//         $data = [
//             'user' => $user,
//             'reports' => $reports,
//             'graph_data' => $graph_data,
//             'comments' => $comments,
//         ];

        
//         // $data += $this->counts($user);
//         return view('users.reports', $data);
//     }

    public function show($id)
    { 
        $report = Report::find($id);
        $user = $report->user;
        $comments = $report->comments()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'report' => $report,
            'comments' => $comments,
        ];
            
        return view('reports.show', $data);
    }
}
