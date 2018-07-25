@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
@extends('layouts.app')


@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu%7CLobster%7CLobster+Two%7CMerienda');
</style>

@include('commons.curdateiine')

<?php

    $recent_reports = App\Report::whereDate('created_at', DB::raw('current_date'))->orderBy('created_at','desc')->get();
    if($recent_reports == false || empty($recent_reports) || 0 == count($recent_reports)) {
    $number = 1;
    } else {      
    $number = ($recent_reports[0]->result_1 +  $recent_reports[0]->result_2 +  $recent_reports[0]->result_3) /3 ;
    }
?>



    <div class="col-lg-12" style="margin-top:20px; margin-bottom:20px; font-family: 'Merienda', cursive;">
<h3 style="color:lightskyblue;">
<?php
    // $recent_reports = App\Report::whereDate('created_at', DB::raw('current_date'))->orderBy('created_at','desc')->get();
    
    $recent_reports = App\Report::orderBy('created_at','desc')->where( 'reports.user_id', $user->id )->limit(1)->get();
              
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
    
if (Auth::id() == $user->id) {
        
    if ($number > 99) {
        print 'Your accomplishment is ' . $number . '% Congrats!! ' . PHP_EOL;
    }
    
    elseif ($number >= 80) {
        print 'Your accomplishment is '. $number . '% You are very close! ' . PHP_EOL;
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
?>
</h3>
</div>
  <div class="row">
 <aside class="col-xs-3">
<div class="panel panel-default">
                <div class="panel-heading" style="hight:20px;">
                    <h3 class="panel-title">{{ $user->username }}</h3>
                </div>
                 <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 230) }}" alt="" style="padding-top:10px; padding-bottom:10px; padding-right:10px; padding-left:15px;">
                <div class="panel-body col-xs-3">
                </div>
                 <div class="row col-lg-12" style="margin-left:0px; font-family: 'Lobster', cursive;">
               <a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button">Show Calendar</a>
               <br>
               @include('user_follow.follow_button', ['user' => $user])
               </div>
</div>
            
</aside>

        
<div class="row col-lg-9">
    <div class="col-lg-12" style="margin-left:40px;">
        <ul class="nav nav-tabs">
            <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('reports.reports', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Reports&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
            <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('users.comments', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComments Box&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
            <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('users.other', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAnalytics&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>                   
            <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px; font-family: 'Gaegu', cursive;">
               @if (count($reports) > 0)
                        @include('comments.comments', ['comments' =>$comments])
                    @endif
            </div>
        </ul>
    </div>
</div>
@endsection