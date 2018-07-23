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
        
        $day = date("y/m/d");
        $week = date("y/m/d", strtotime("-1 week"));
        $month = date("y/m/d", strtotime("-1 month"));
        
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

        
        // $data += $this->counts($user);
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

        $favoriters = null;
        if (!is_null($report)) {
            $favoriters = DB::table('user_favorite')
            ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
            ->join('users', 'users.id', '=', 'user_favorite.user_id')
            ->where('user_favorite.report_id', $report->id)
            ->whereDate('reports.created_at' ,$thatday_date)
            ->select('users.username')
            ->get();
        }



/*
        $user = User::find($id);
        $reports = DB::table('reports')
        ->where('user_id', $id)
        ->get();
        
        dd($reports->toArray());

    foreach ($reports as $report) {

        $favoriters = DB::table('user_favorite')
        ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
        ->join('users', 'users.id', '=', 'user_favorite.user_id')
        ->where('user_favorite.report_id', $report->id)
        ->whereDate('reports.created_at' ,$thatday_date)
        // ->select('users.username')
        ->select()
        ->get()->toArray();
    }
    dd($favoriters);
*/    
        $data = [
            'user' => $user,
            'favoriters' => $favoriters,
            'thatday_date' => $thatday_date,
        ];
        
        return view('users.favoriters', $data);
    }
    
    
    
    
}