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

<div class="panel panel-default col-lg-3 col-md-3 col-sm-12 col-xs-12" style=" font-family: 'Lobster', cursive; margin-top:20px; margin-right:60px;">                
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $user->username }}</h3>
                            </div>
                    <div class="panel-body col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        @include('users.google', ['graph_data' => $graph_data])
                    </div>
                    </div>
                    
<div class="row col-lg-8">
    <div class="col-lg-12" style="margin-top:20px; font-family: 'Merienda', cursive;">
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
            <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('reports.reports', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Reports&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
            <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('users.comments', ['id' => $comments->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Comments&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="font-family: 'Merienda', cursive; color:black; padding-top:20px; padding-bottom:20px;">
                    @if (count($reports) > 0)
                        @include('comments.comments', ['comments' =>$comments])
                    @endif
                </div>
        </ul>
</div>
@endsection