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

<link href="/css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" >
        
$(document).ready(function(){
$('#ani').hover(function(e){
e.preventDefault();
$('#ani').removeClass().addClass(' bounceInRight ' + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
$(this).removeClass();
                });
            });
        });
    </script>

<h1 style="font-family: 'Roboto Condensed', sans-serif;>
    <div id="ani" class="animated bounceInRight">
<?php

    $today_reports = App\Report::whereDate('created_at', DB::raw('current_date'))->orderBy('created_at','desc')->get();
    
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
?>
</h1>
</div>



<div class="panel panel-default col-lg-10 col-md-10 col-sm-12 col-xs-12" style="width:auto: height:auto; margin-left:110px; font-family: 'Lobster', cursive; margin-top:20px; margin-right:60px;">                
                        
                    <div class="panel-body col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        @include('users.google', ['graph_data' => $graph_data])
                    </div>
                    </div>

@endsection