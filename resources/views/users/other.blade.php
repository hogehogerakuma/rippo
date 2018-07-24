@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
@extends('layouts.app')


@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>

<div class="row col-lg-10" style="margin-left:80px;">
    <div class="col-lg-12" style="margin-top:20px; font-family: 'Merienda', cursive;">
<h3 style="color:lightskyblue;">
<?php

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
@include('commons.curdateiine')

</h3>
</div>
</div>
<div class="panel panel-default col-lg-10 col-md-10 col-sm-12 col-xs-12" style="width:auto: height:auto; margin-left:110px; font-family: 'Lobster', cursive; margin-top:20px; margin-right:60px;">                
                        
                    <div class="panel-body col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        @include('users.google', ['graph_data' => $graph_data])
                    </div>
                    </div>


                
</div>
</div>
<div class="row col-lg-10" style="margin-right:200px; margin-left:120px; font-family: 'Lobster', cursive;">
<a href="{{route('reports.reports', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button" style="font-family: 'Lobster', cursive;" >User's page</a>


            </div>
            
@endsection

        