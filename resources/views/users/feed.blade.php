@if (Auth::check())
<?php $bgimage = '/images/hosizora.jpg'; ?>
@endif

@extends('layouts.app')
@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Fjalla+One%7CLobster%7COswald:500%7CRoboto+Condensed');
</style>

@foreach ($reports as $report)
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
                
        <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:10px; font-family: 'Gaegu', cursive;">
      <h2 style="color:black; background-color:pink; font-family: 'Lobster', cursive;"><b>Follower's Daily Reports</b></h2>
            @if (count($reports) > 0)
                @include('reports.reports', ['report' => $report, 'user' => $user])
            @endif
        </div>
    </ul>
</div>
</div>
@endforeach
@endsection