<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class CommonsController extends Controller
{
    public function show($id)
    {
     $user = User::find($id);
     $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
     // $favoriters = DB::table('user_favorite')
     //    ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
     //    ->join('users', 'users.id', '=', 'user_favorite.user_id')
     //    ->whereDay('reports.created_at' ,$thatday_date)
     //    ->where('reports.user_id', $user->id)
     //    ->get();
     // $favoriter_id = $report->users_id;
        
     $data = [
         'user' => $user,
         'reports' => $reports,
         // 'favoriters' => $favoriters
         // 'favoriters_id => $favoriters_id,'
         ];
        
     return view('commons.calendar', $data);   
    }
}
