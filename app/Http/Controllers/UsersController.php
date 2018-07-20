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
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
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
    
    public function favoriters($id)
    {
        $user = User::find($id);
        $reportid = DB::table('reports')
         ->where('reports.user_id', $id)
         ->select('reports.id')
         ->first();
        // $thatday_date = DateTime::createFromFormat('Y-m-d H:i:s', $report->created_at)->format('d');
        $favoriters = DB::table('user_favorite')
         ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
         ->join('users', 'users.id', '=', 'user_favorite.user_id')
         ->where('user_favorite.report_id', $reportid->id)
        //  ->whereDay('reports.created_at' ,$thatday_date)
         ->select('users.username')
         ->get();
         
         
        $data = [
            'user' => $user,
            'favoriters' => $favoriters,
            // 'thatday_date' => $thatday_date,
        ];
        
        return view('users.favoriters', $data);
    }
}