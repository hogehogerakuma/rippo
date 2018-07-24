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
@include('commons.curdateiine')

<?php

    $today_reports = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->orderBy('created_at','desc')->get();
    if($today_reports == false || empty($today_reports) || 0 == count($today_reports)) {
    $number = 1;
    } else {      
    $number = ($today_reports[0]->result_1 +  $today_reports[0]->result_2 +  $today_reports[0]->result_3) /3 ;
    }
?>

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

        