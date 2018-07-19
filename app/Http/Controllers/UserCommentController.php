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
    
    public function show($id)
    {  
        $user = User::find($id);
        $reports = $user->reports()->get();
        $report_ids = array();
        foreach($reports as $r) {
            array_push($report_ids, $r->id);
        }
        
        $comments = Comment::whereIn('report_id',$report_ids)->orderBy('created_at', 'desc')->get();
        
        //$comments = $report->comments()->orderBy('created_at', 'desc')->paginate(1;
        //  dd($report_ids);
        // exit;
        
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