@extends('layouts.app')

@section('content');
<style>
<<<<<<< HEAD
@import url('https://fonts.googleapis.com/css?family=Gaegu%7CLobster%7CLobster+Two%7CMerienda');
@import url('https://fonts.googleapis.com/css?family=Anton%7CMarkazi+Text%7CPT+Sans+Narrow');
=======
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
@import url('https://fonts.googleapis.com/css?family=Fjalla+One%7CLobster%7COswald:500%7CRoboto+Condensed');
@import url('https://fonts.googleapis.com/css?family=Cabin+Condensed%7CHind+Siliguri%7CNews+Cycle%7CVast+Shadow');
@import url('https://fonts.googleapis.com/css?family=Cabin+Condensed%7CCabin+Sketch%7CHind+Siliguri%7CNews+Cycle%7CVast+Shadow');
>>>>>>> 381980a87bc0d65dc2d1eff4f852bb2d01e465aa
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
            <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href="{{route('users.feed', ['id' => $user->id])}}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-tags"></span>&nbsp&nbspFollowings Feed&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                
            <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px; font-family: 'Gaegu', cursive;">
                @if (count($reports) > 0)
                    @include('reports.reports', ['reports' => $reports])
                @endif
            </div>
        </ul>
    </div>
</div>
    @else
        <div class="center jumbotron" style="background:rgba(0,0,0,0.0); font-family: 'font-family: 'Vast Shadow', cursive;">
            <div class="text-center">
                <h1 style= "font-family: 'Anton', cursive;">Welcome To The</h1>
                <h1 style= "font-family: 'Anton',cursive;">RIPPO</h1>
                <h1 style= "font-family: '', cursive;">:)</h1>

                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-danger']) !!}
                <link href="signupbotton.css" rel="stylesheet" type="text/css">


<!--hover埋めたい-->


                
            </div>
        </div>
    @endif
@endsection