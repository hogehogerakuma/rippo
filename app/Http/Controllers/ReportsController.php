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
        date_default_timezone_set('Asia/Tokyo');
            
        $user = \Auth::user();
        $reports = Report::orderBy('created_at', 'desc')->paginate(10);
        foreach($reports as $report)
        {
            $report->favCnt = DB::table('user_favorite')
            ->where('report_id', $report->id)
            ->count();
        }
        $data = [
            'user' => $user,
            'reports' => $reports,
        ];
        return view('welcome', $data);
    }
    
    public function indextwo()
{
    $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reports = $user->respectuser_reports()->orderBy('created_at', 'desc')->paginate(10);
       
        foreach($reports as $report) {
            $report->favCnt = DB::table('user_favorite')
            ->where('report_id', $report->id)
            ->count();
        }    
            $data = [
                'user' => $user,
                'reports' => $reports,
            ];
        }
        return view('users.feed', $data);
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
       
        date_default_timezone_set('Asia/Tokyo');

        $user = User::find($id);
        $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
       
        foreach($reports as $report)
            {
                $report->thatday_date = Datetime::createFromFormat('Y-m-d H:i:s', $report->created_at)->format('d');
                
                $report->favCnt =  DB::table('user_favorite')
                ->where('report_id', $report->id)
                ->count();
                
                $favoriters = DB::table('user_favorite')
                ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
                ->join('users', 'users.id', '=', 'user_favorite.user_id')
                ->whereDay('reports.created_at' ,$report->thatday_date)
                ->select('users.username')
                ->get();
                
            }
        
        $day = date("Y/m/d");
        $week = date("Y/m/d", strtotime("-1 week"));
        $month = date("Y/m/d", strtotime("-1 month"));
    
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
        return view('users.reports', $data);
    }
public function commentsFromUser($id) {
         
      $user = User::find($id);
        $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);
        
        $day = date("Y/m/d");
        $week = date("Y/m/d", strtotime("-1 week"));
        $month = date("Y/m/d", strtotime("-1 month"));
        
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
        
        return view('users.reports', $data);
    }
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
    
    public function favoriters ($id) {
        $report = Report::find($id);
       
        $favoriters = DB::table('user_favorite')
         ->join('reports', 'reports.id', '=', 'user_favorite.report_id')
         ->join('users', 'users.id', '=', 'user_favorite.user_id')
         ->where('report_id', $report->id)
        //  ->select('users.username')
         ->get();
          
        $data = [
            'favoriters' => $favoriters,
        ];
        return view('reports.favoriters', $data);
    }
    
    public function graphs($id)
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
            $followers = $user->followers()->where('user_follow.created_at', '>', $value)->count();
            $favorited = DB::table('user_favorite')->join('reports', 'reports.id', '=', 'user_favorite.report_id')->where( 'reports.user_id', '=', $user->id )->where('reports.created_at', '>', $value)->get()->count();
            $feedfeed = DB::table('comments')->join('reports', 'reports.id', '=', 'comments.report_id')->where( 'reports.user_id', '=', $user->id )->where( 'reports.created_at','>', $value )->get()->count();
            $graph_data = array_merge($graph_data, [[$value, $favorites,$favorited,$feedfeed]]);
        }
                
        $data = [
            'user' => $user,
            'reports' => $reports,
            'graph_data' => $graph_data,
            'comments' => $comments,
        ];
        
        return view('users.other', $data);
    }
    
    public function thatday_report($id, $thatday_date) {
        $user = User::find($id);
        
        $report = DB::table('reports')
        ->where('reports.user_id', $id)
        ->whereDate('reports.created_at' ,$thatday_date)
        ->first();
        
        if (!is_null($report)) {
            $report->favCnt = DB::table('user_favorite')
            ->where('report_id', $report->id)
            ->count();
        }
        else {
            return redirect()->back();
        }
        $data = [
            'user' => $user,
            'report' => $report,
            ];
        
        return view('users.report', $data);
    }
}
