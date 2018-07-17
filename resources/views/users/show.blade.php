@extends('layouts.app')

@section('content')

@if (Auth::id() != $user->id)
<h1>こちらは <?php print $user->username?>さんのカレンダーです。</h1>
@endif


@include('commons.curdateiine')


@include ('commons.otherscalendar')


　

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
            <!--@include('user_follow.follow_button', ['user' => $user])-->
            
<?php

    $today_reports = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at','desc')->get();
    if($today_reports == false || empty($today_reports) || 0 == count($today_reports)) {
    $number = 1;
    } else {      
    $number = ($today_reports[0]->result_1 +  $today_reports[0]->result_2 +  $today_reports[0]->result_3) /3 ;
    }
?>


<div class="panel panel-default col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-right:60px;">                
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $user->username }}</h3>
                            </div>
                    <div class="panel-body col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        @include('users.google', ['graph_data' => $graph_data])
                    </div>
                    </div>
                    
<div class="row col-lg-9">
    <div class="col-lg-12">
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
</div>

<div class="col-lg-12">
    <ul class="nav nav-tabs">
        <li role="activate" style="color:white;"><a href='{{route('reports.reports', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Reports&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
        <!--<li role="activate" style="color:white;"><a href='{{route('users.comments', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Comments&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>-->
                  
    <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px;">
                @if (count($reports) > 0)
                    @include('reports.reports', ['reports' => $reports])
                @endif
                </div>
            </div>
            </ul>
            
            <!--<div class="col-xs-8">-->
            <!--    <h3>My Replies</h3>-->
            <!--    @if (count($comments) > 0)-->
            <!--        @include('comments.comments', ['comments' =>$comments])-->
            <!--    @endif-->
            <!--</div>-->
    </div>
    
@endsection