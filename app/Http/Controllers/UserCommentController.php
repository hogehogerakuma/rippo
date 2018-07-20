<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Report;
use App\Comment;
use Illuminate\Support\Facades\DB;


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

//  public function favorited($id, $thatday_date) {
    //     $user = User::find($id);
    //     $favorited = DB::table('user_favorite')->join('reports', 'reports.id', '=', 'user_favorite.report_id')->whereDay('reports.created_at', $day)->where( 'reports.user_id', $user->id )->count();

    
    //     $report = Report::find($id);
    //     // $favoriters = $report->favoriters();
         
         
    //     $data = [
    //         'user' => $user,
    //         'report' => $report,
    //         'favoriters' => $favoriters,
    //     ];
        
    //     return view('users.favoriters', $data);
    // }    
    public function show($id)
    {  
        $user = User::find($id);
        $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
        
        $day = date("y/m/d");
        $tomorrow = date("y/m/d", strtotime("-1 day"));
        $aftertwo = date("y/m/d", strtotime("-2 day"));
        $afterthree = date("y/m/d", strtotime("-3 day"));
        $afterfour = date("y/m/d", strtotime("-4 day"));
        $afterfive = date("y/m/d", strtotime("-5 day"));
        // var_dump($month);
        // exit;
        
        $graph_data = [
            ['Date', 'Favorites','Favorited', 'Comments'],
        ];
    
        $searches = [$day,$tomorrow,$aftertwo,$afterthree,$afterfour,$afterfive];
        foreach ($searches as $value) {
            $favorites = $user-> favorites()->where('user_favorite.created_at', '>', $value)->get()->count();
            $followers = $user->followers()->where('user_follow.created_at', '>', $value)->get()->count();
            $favorited = DB::table('user_favorite')->join('reports', 'reports.id', '=', 'user_favorite.report_id')->where( 'reports.user_id', '=', $user->id )->where('reports.created_at', '>', $value)->get()->count();
            $feedfeed = DB::table('comments')->join('reports', 'reports.id', '=', 'comments.report_id')->where( 'reports.user_id', '=', $user->id )->where( 'reports.created_at','>', $value )->get()->count();
   
            // DB::table('user_favorite')->join('reports', 'reports.use_id', '=', 'user_favorite.report_id')->whereDay('reports.created_at', $day)->where( 'reports.user_id.created_at', $value )->get()->count();
            // $feedfeed = DB::table('comments')->join('reports', 'reports.id', '=', 'comments.report_id')->whereDay('reports.created_at', $day)->where( 'reports.user_id.created_at', $value )->get()->count();
   
            // $favorited = $user->favorited()->where('user_follow.created_at', '>', $value)->get()->count();
            // $favorited = DB::table('user_favorite')->join('reports', 'reports.id', '=', 'user_favorite.report_id')->whereDay('reports.created_at', $day)->where( 'reports.user_id', $user->id )->count();

            $graph_data = array_merge($graph_data, [[$value, $favorites,$favorited,$feedfeed]]);
        
        }
// var_dump($graph_data);
// exit;
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