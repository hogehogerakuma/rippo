<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Report;
use App\Comment;
use DateTime;
use Illuminate\Support\Facades\DB;


class UserCommentController extends Controller
{
    public function index($id, $thatday_date)
    {
        $user = User::find($id);
        $report = DB::table('reports')
        ->where('reports.user_id', $id)
        ->whereDate('reports.created_at' ,$thatday_date)
        ->first();
        
        $comments = [];
        if (!is_null($report)) {
        $comments = DB::table('comments')
        ->join('reports', 'reports.id', '=', 'comments.report_id')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->where('comments.report_id', $report->id)
        ->whereDate('reports.created_at' ,$thatday_date)
        ->get();
        }
        else {
            return redirect()->back();
        }
        
        $data = [
            'user' => $user,
            'comments' => $comments,
            'thatday_date' => $thatday_date,
        ];
        
        
        return view('reports.comments', $data);
    }
        
     public function store(Request $request, $id)
    {
        $report = Report::find($id);

        $report->comments()->create([
            'user_id' => \Auth::user()->id,
            'report_id' => $request->report_id,
            'comment' => $request->comment,
        ]);
        return redirect()->back();
    }

    public function show($id)
    {  
        $user = User::find($id);
        $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
        
        $day = date("Y/m/d");
        $tomorrow = date("Y/m/d", strtotime("-1 day"));
        $aftertwo = date("Y/m/d", strtotime("-2 day"));
        $afterthree = date("Y/m/d", strtotime("-3 day"));
        $afterfour = date("Y/m/d", strtotime("-4 day"));
        $afterfive = date("Y/m/d", strtotime("-5 day"));
        
       $graph_data = [
            ['Date', 'Followers','Favorited', 'Comments'],
        ];
    
        $searches = [$day,$tomorrow,$aftertwo,$afterthree,$afterfour,$afterfive];
        foreach ($searches as $value) {
            $favorites = $user-> favorites()->where('user_favorite.created_at', '>', $value)->get()->count();
            $followers = $user->followers()->where('user_follow.created_at', '>', $value)->get()->count();
            $favorited = DB::table('user_favorite')->join('reports', 'reports.id', '=', 'user_favorite.report_id')->where( 'reports.user_id', '=', $user->id )->where('reports.created_at', '>', $value)->get()->count();
            $feedfeed = DB::table('comments')->join('reports', 'reports.id', '=', 'comments.report_id')->where( 'reports.user_id', '=', $user->id )->where( 'reports.created_at','>', $value )->get()->count();
   
            $graph_data = array_merge($graph_data, [[$value, $followers,$favorited,$feedfeed]]);
        }

        $data = [
            'user' => $user,
            'reports' => $reports,
            'graph_data' => $graph_data,
            'comments' => $comments,
        ];
            
        return view('users.comments', $data);
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