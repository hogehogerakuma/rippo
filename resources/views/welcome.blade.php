@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Fjalla+One|Lobster|Oswald:500|Roboto+Condensed');
</style>

@if (Auth::check())
<div class="row col-lg-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-1">
<div class="RIKONOZOMI" style="color:lightgreen; font-family: 'lobster', cursive; margin-left:15px;">
<h3>
<?php
        date_default_timezone_set('Asia/Tokyo');
        $hour = (int)date('H');
        
        $msg = "";
    
    if($hour>= 6&& $hour<12){
        $msg = "Good Morning Guys! Good day to you:)". PHP_EOL;
    }
    
    elseif($hour>=12 && $hour<19){
        $msg = "Good Afternoon!". PHP_EOL;
    }

    else {$msg = "GOOD Evening! Take a rest!" . PHP_EOL;
    }
        print $msg
?>
</h3>
</div>
<div class="Qoo col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:0px; padding-bottom:20px;">
            <ul class="nav nav-tabs">
               <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href='{{route('home')}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-th-list"></span>&nbsp&nbspDoukie's FEED&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href='{{route('feed.feed', ['id' => Auth::user()->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-tags"></span>&nbsp&nbspFollowings Feed&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                
                <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px; font-family: 'Gaegu', cursive;">
                <h2 style="color:black; background-color:pink; font-family: 'Lobster', cursive;"><b>Today's Daily Reports</b></h2>
                @if (count($reports) > 0)
                    @include('reports.reports', ['reports' => $reports])
                @endif
                   </div>
         </ul>
         </div>
         </div>


    @else
    <head></head>
    
    
        <div class="center jumbotron" style="background:rgba(0,0,0,0.0); font-family: 'Lobster', cursive;">
            <div class="text-center">
                <br>
                <br>
                <h1 style= "color:black; font-family: 'Lobster', cursive;">Welcome To The</h1>
                <h1 style= "color:black; font-family: 'Lobster', cursive;">RIPPO:)</h1><br>
               </div>
            
            <div class="text-center" style="font-family: 'Oswald', sans-serif;">
                <h4 style= "color:black; font-family: 'Oswald', sans-serif;">Havana, ooh na-na (ay)Half of my heart is in Havana, ooh-na-na (ay, ay)</h4>
                <h4 style= "color:black; font-family: 'Oswald', sans-serif;">Oh, but my heart is in Havana (ay)There's somethin' 'bout his manners (uh huh)Havana</h4><br>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-danger']) !!}
            </div>
            
        </div>
        </body>
    @endif
@endsection