<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Report;

class CommonsController extends Controller
{
 
 
    public function show($id)
    {
        $user = \Auth::user();
        $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
        foreach($reports as $report)
            {
                $report->favCnt = DB::table('user_favorite')
                ->where('report_id', $report->id)
                ->count();
            }
        $data = [
            'user' => $user,
            'report' => $report,
        ];
        return view('commons.calendar', $data);
    }
}