@extends('layouts.app')

@section('content')

@include('commons.curdateiine')
    <div class="row">
        <aside class="col-md-24">
            <div class="panel panel-default col-xs-4">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->username }}</h3>
                </div>
                <div class="panel-body">
                    @include('users.google', ['graph_data' => $graph_data])
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
            
            
            
            
            
<?php

    $today_reports = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at','desc')->get();
    if($today_reports == false || empty($today_reports) || 0 == count($today_reports)) {
    $number = 1;
    } else {      
    $number = ($today_reports[0]->result_1 +  $today_reports[0]->result_2 +  $today_reports[0]->result_3) /3 ;
    }
?>

<h1>
<?php

    $today_reports = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at','desc')->get();
    
    if($today_reports == false || empty($today_reports) || 0 == count($today_reports)) {
    $number = 0;
    }
    
    elseif ($today_reports[0]->result_2 == false || empty($today_reports) || 0 == count($today_reports) && $today_reports[0]->result_3 ==false || empty($today_reports) || 0 == count($today_reports)){
        $number = $today_reports[0]->result_1;
    }
    
    elseif ($today_reports[0]->result_3 == false || empty($today_reports) || 0 == count($today_reports)) {
        $number = ($today_reports[0]->result_1 +  $today_reports[0]->result_2) /2 ;
    }
    
    else {
        $number = ($today_reports[0]->result_1 +  $today_reports[0]->result_2 +  $today_reports[0]->result_3) /3 ;
    }

    
    if ($number > 99) {
        print '今日の達成率'. $number . '% おめでとう！' . PHP_EOL;
    }
    
    elseif ($number >= 80) {
        print '今日の達成率'. $number . '% あとちょっとだね！' . PHP_EOL;
    }
    
    elseif ($number >= 60) {
        print '今日の達成率'. $number . '% この調子だね！' . PHP_EOL;
    }
    
    elseif ($number >= 40) {
        print '今日の達成率'. $number . '% がんばって～！' . PHP_EOL;
    }
    
     else {
        print '今日の達成率'. $number . '%って、、やる気あるの？？' . PHP_EOL;
    }

?>
</h1>

<?php
date_default_timezone_set('Asia/Tokyo');
$now_month =  (int)date("m");
            $now_date = (int)date("d");
?>

<?php



    $popopo = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->where('user_id', $user->id)->get();
    if (isset ($popopo) && count($popopo)>0 ) {
        $dashitaka = '既に日報は提出済みです';
    }
    else {
        $dashitaka =  '日報を出してください。';
    }

?>

                
             <div class="col-lg-offset-1 col-lg-7 col-md-offset-1 col-md-6 col-sm-8 col-xs-12">
                <h3>My Reports</h3>
                @if (count($reports) > 0)
                    @include('reports.reports', ['reports' => $reports])
                @endif
            </div>
            <div class="col-xs-8">
                <h3>My Replies</h3>
                @if (count($comments) > 0)
                    @include('comments.comments', ['comments' =>$comments])
                @endif
            </div>
    </div>
@endsection