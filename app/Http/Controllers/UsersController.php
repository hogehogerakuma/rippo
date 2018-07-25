<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Report;
use App\Comment;
use DateTime;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->id);
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
         //   var_dump($followers);
        //    var_dump($favorites);

        }

//exit;

        $data = [
            'user' => $user,
            'reports' => $reports,
            'graph_data' => $graph_data,
            'comments' => $comments,
        ];

        return view('users.index', $data);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
        
        $day = date("Y/m/d");
        $week = date("Y/m/d", strtotime("-1 week"));
        $month = date("Y/m/d", strtotime("-1 month"));
        
        $graph_data = [
            ['Date', 'Favorites', 'Followers'],
        ];
    
        $searches = [$day, $week, $month];
        foreach ($searches as $value) {
            $favorites = $user-> favorites()->where('user_favorite.created_at', '>', $value)->get()->count();
            $followers = $user->followers()->where('user_follow.created_at', '>', $value)->get()->count();

            $graph_data = array_merge($graph_data, [[$value, $favorites, $followers]]);
        }

        $data = [
            'user' => $user,
            'reports' => $reports,
            'graph_data' => $graph_data,
            'comments' => $comments,
        ];
        
        return view('users.show', $data);
    }
    
    public function store(Request $request, $id)
    {	
    \Auth::user()->follow($id);	
    return redirect()->back();	
    }	
    
    public function destroy($id)	
    {	
    \Auth::user()->unfollow($id);	
    return redirect()->back();	
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
            ];
            
            $data += $this->counts($user);
            
            return view('users.followings', $data);
    }
    
    public function followers($id)
    {
     $user = User::find($id);
     $followers = $user->followers()->paginate(10);
     
     $data = [
         'user' => $user,
         'users' => $followers,
         ];
    $data += $this->counts($user);
    
    return view('users.followers', $data);
    }
    
    public function favoriters($id, $thatday_date)
    {
        $user = User::find($id);
        $report = DB::table('reports')
        ->where('user_id', $id)
        ->whereDate('reports.created_at' ,$thatday_date)
        ->first();

        $favoriters = [];
        if (!is_null($report)) {
            $favoriters = DB::table('user_favorite')
            ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
            ->join('users', 'users.id', '=', 'user_favorite.user_id')
            ->where('user_favorite.report_id', $report->id)
            ->whereDate('reports.created_at' ,$thatday_date)
            ->select('users.username')
            ->get();
        }
        
        $data = [
            'user' => $user,
            'favoriters' => $favoriters,
            'thatday_date' => $thatday_date,
            'report' => $report,
        ];
        
        return view('users.favoriters', $data);
    }
}