@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>

@include('commons.curdateiine')

<?php

    $today_reports = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at','desc')->get();
    if($today_reports == false || empty($today_reports) || 0 == count($today_reports)) {
    $number = 1;
    } else {      
    $number = ($today_reports[0]->result_1 +  $today_reports[0]->result_2 +  $today_reports[0]->result_3) /3 ;
    }
?>


<div class="row col-lg-10" style="margin-left:100px;">
    <div class="col-lg-12" style="margin-top:20px; font-family: 'Merienda', cursive;">
<h3 style="color:lightskyblue;">
<?php


//  $today_reports = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at','desc')->where( 'reports.user_id', $user->id )->get();
$recent_reports = App\Report::orderBy('created_at','desc')->where( 'reports.user_id', $user->id )->limit(1)->get();
// $recent_feed = App\Comment::orderBy('created_at', 'desc')->where( 'comments.report_id', $user->id)->get();
// $recent_feed = DB::table('comments')->join('reports', 'reports.id', '=', 'comments.report_id')->whereDate('created_at', DB::raw('CURDATE()'))->where( 'comments.user_id', $user->id )->count();
// $recent_feed = App\Comment::whereDate('created_at', DB::raw('CURDATE()'))
//               ->orderBy('created_at', 'desc')
//               ->
//               ->where( 'reports.user_id', $user->id )
//               ->count();  
    //  $recent_feed = DB::table('comments')
    //           ->join('reports', 'reports.id', '=', 'comments.report_id')
    //           ->where( 'reports.user_id', $user->id )
    //           ->orderBy('created_at', desc')
    //           ->limit(1)
    //           ->count();
    
    // $today_reports = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at','desc')->count();
 
 $chokin_report_day = App\Report::orderBy('created_at','desc')->where( 'reports.user_id', $user->id )->limit(1)->select('created_at')->get();
 
       $chokin_count = DB::table('comments')
        ->join('reports', 'reports.id', '=', 'comments.report_id')
        ->where('reports.created_at', "=" , $chokin_report_day )
        ->where('reports.user_id', $user->id)
        ->count();      
              
            //   $cmtCnt = DB::table('comments')
            //     ->join('reports', 'reports.id', '=', 'comments.report_id')
            //     ->join('users', 'users.id', '=', 'comments.user_id')
            //     ->whereDay('reports.created_at', $report->thatday_date)
            //     ->where('comments.report_id', $report->id)
            //     ->select('id')
            //     ->count();
              
    if($recent_reports == false || empty($recent_reports) || 0 == count($recent_reports)) {
    $number = 0;
    }
    
    elseif ($recent_reports[0]->result_2 == false || empty($recent_reports) || 0 == count($recent_reports) && $recent_reports[0]->result_3 ==false || empty($recent_reports) || 0 == count($recent_reports)){
        $number = $recent_reports[0]->result_1;
    }
    
    elseif ($recent_reports[0]->result_3 == false || empty($recent_reports) || 0 == count($recent_reports)) {
        $number = ($recent_reports[0]->result_1 +  $recent_reports[0]->result_2) /2 ;
    }
    
    else {
        $number = ($recent_reports[0]->result_1 +  $recent_reports[0]->result_2 +  $recent_reports[0]->result_3) /3 ;
    }
   if (Auth::id() == $user->id){
    
    if ($number > 99) {
        print 'Your accomplishment is ' . $number . '% Congrats!! ' . PHP_EOL;
    }
    
    elseif ($number >= 80) {
        print "your accomplishment is ". $number ."% It is very close! " . PHP_EOL;
    }
    
    elseif ($number >= 60) {
        print 'Your accomplishment is '. $number . '% Keep this going!' . PHP_EOL;
    }
    
    elseif ($number >= 40) {
        print 'Your accomplishement is '. $number . '% You can do this! Hwaiting!' . PHP_EOL;
    }
    
     else {
        print 'Your accomplishement is '. $number . '% Need a motivation boost?' . PHP_EOL;
    }
    
   }elseif(Auth::id() != $user->id){
           
    if ($number > 99) {
        print $user->username."'s accomplishment is ". $number . "% Congrats!! " . PHP_EOL;
    }
    
    elseif ($number >= 80) {
        print $user->username."'s accomplishment is ". $number ."% It is very close! " . PHP_EOL;
    }
    
    elseif ($number >= 60) {
        print $user->username."'s accomplishment is ". $number . "% Keep this going!" . PHP_EOL;
    }
    
    elseif ($number >= 40) {
        print $user->username."'s accomplishment is ". $number . "% Hwaiting!" . PHP_EOL;
    }
    
     else {
        print $user->username."'s accomplishment is ". $number . "% Need a motivation boost." . PHP_EOL;
    }
    
   }
   
//   print $numfeedtoday;
//   print $chokin_report_day;
//   print $chokin_count;

  print $cmtCnt;
?>
 
</h3>

</div>

                
          <div class="col-lg-12">
            <ul class="nav nav-tabs">
               <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('reports.reports', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Reports&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('users.comments', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComments Box&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('users.other', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAnalytics&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>                   <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px; font-family: 'Gaegu', cursive;">
                @if (count($reports) > 0)
                    @include('reports.reports', ['reports' => $reports])
                @endif
                   </div>
         </ul>
         </div>
</div>
</div>
<div class="row col-lg-10" style="margin-right:200px; margin-left:120px; font-family: 'Lobster', cursive;">
<a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button">Show Calendar</a>

            </div>
            
@endsection

        