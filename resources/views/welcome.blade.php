@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>

@if (Auth::check())

<div class="panel panel-default col-lg-10 col-md-10 col-sm-12 col-xs-12" style="padding-top:0px; padding-bottom:20px; margin-left:90px;"> 
<h2 style="color:black; background-color:pink; font-family: 'Lobster', cursive;"><b>Today's Daily Reports</b></h2>
<?php
        date_default_timezone_set('Asia/Tokyo');
        $hour = (int)date('H');
        
        $msg = "";
    
    if($hour>= 6&& $hour<12){
        $msg = "おはよう！今日も頑張っていこう！". PHP_EOL;
    }
    
    elseif($hour>=12 && $hour<19){
        $msg = "こんにちは！お昼は何を食べたのかな？". PHP_EOL;
    }

    else {$msg = "こんばんは！良い一日を過ごせたかな？" . PHP_EOL;
    }
        print $msg
        
?>
        @if (count($reports) > 0)
            @include('reports.reports', ['reports' => $reports])
        @endif
    </div>
    @else
        <div class="center jumbotron" style="background:rgba(0,0,0,0.0); font-family: 'Lobster', cursive;">
            <div class="text-center">
                <h1 style= "font-family: 'Lobster', cursive;">Welcome To The</h1>
                <h1 style= "font-family: 'Lobster', cursive;">RIPPO:)</h1><br>
                <h4 style= "font-family: 'Lobster', cursive;">Havana, ooh na-na (ay)Half of my heart is in Havana, ooh-na-na (ay, ay)</h4>
                <h4 style= "font-family: 'Lobster', cursive;">Oh, but my heart is in Havana (ay)There's somethin' 'bout his manners (uh huh)Havana</h4><br>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-danger']) !!}
            </div>
        </div>
    @endif
@endsection