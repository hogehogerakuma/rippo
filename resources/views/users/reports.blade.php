@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
@extends('layouts.app')


@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
</style>

@include('commons.curdateiine')
<<<<<<< HEAD
<div class="panel panel-default col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top: 20px; margin-right:60px; font-family: 'Lobster', cursive;">                
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $user->username }}</h3>
                        </div>
                            <div class="panel-body col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                @include('users.google', ['graph_data' => $graph_data])
                            </div>
                        </div>
                    
<div class="row col-lg-8">
    <div class="col-lg-12" style="margin-top:20px; font-family: 'Roboto Condensed', sans-serif;>
<h2 style="color:white;">
    
<?php // CSSをうめこみたい   ?>
<?php ('Content-Type: text/css; charset=utf-8'); ?>
<link href="/css/RippoRikoCSSpractice.css" rel="stylesheet" type="text/css">
<?php
//  $today_reports = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at','desc')->where( 'reports.user_id', $user->id )->get();
$recent_reports = App\Report::orderBy('created_at','desc')->where( 'reports.user_id', $user->id )->limit(1)->get();

    if($recent_reports == false || empty($recent_reports) || 0 == count($recent_reports)) {
=======

<?php

    $recent_reports = App\Report::whereDate('created_at', DB::raw('current_date'))->orderBy('created_at','desc')->get();
    if($recent_reports == false || empty($recent_reports) || 0 == count($recent_reports)) {
    $number = 1;
    } else {      
    $number = ($recent_reports[0]->result_1 +  $recent_reports[0]->result_2 +  $recent_reports[0]->result_3) /3 ;
    }
?>


<div class="row col-lg-10" style="margin-left:100px;">
    <div class="col-lg-12" style="margin-top:20px; font-family: 'Merienda', cursive;">
<h3 style="color:lightskyblue;">
<?php
    // $recent_reports = App\Report::whereDate('created_at', DB::raw('current_date'))->orderBy('created_at','desc')->get();
    
    $recent_reports = App\Report::orderBy('created_at','desc')->where( 'reports.user_id', $user->id )->limit(1)->get();
              
    if($recent_reports == false || empty($recent_reports) || 0 == count($recent_reports)) {
    
>>>>>>> 381980a87bc0d65dc2d1eff4f852bb2d01e465aa
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
    
if (Auth::id() == $user->id) {
        
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
<<<<<<< HEAD
    
   }
=======
}
>>>>>>> 381980a87bc0d65dc2d1eff4f852bb2d01e465aa
?>
</h2>
</div>
<<<<<<< HEAD

                
          <div class="col-lg-12">
            <ul class="nav nav-tabs">
                <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('reports.reports', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Reports&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('users.comments', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComments Box&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                   <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px; font-family: 'Gaegu', cursive;">
=======
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('reports.reports', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Reports&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
            <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('users.comments', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComments Box&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
            <li role="activate" style="color:white; font-family: 'Lobster', cursive;"><a href='{{route('users.other', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAnalytics&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>                   
            <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px; font-family: 'Gaegu', cursive;">
>>>>>>> 381980a87bc0d65dc2d1eff4f852bb2d01e465aa
                @if (count($reports) > 0)
                    @include('reports.reports', ['reports' => $reports])
                @endif
            </div>
        </ul>
    </div>
</div>
</div>
<<<<<<< HEAD
<div class="row col-lg-10" style="margin-right:200px; margin-left:120px; "font-family: 'Roboto Condensed', sans-serif;s">
<a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button">Show Calendar</a>

            </div>
=======
<div class="row col-lg-10" style="margin-right:200px; margin-left:120px; font-family: 'Lobster', cursive;">
    <a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button">Show Calendar</a>
</div>
@endsection
>>>>>>> 381980a87bc0d65dc2d1eff4f852bb2d01e465aa
