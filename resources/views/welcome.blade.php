@extends('layouts.app')

@section('content');
<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu%7CLobster%7CLobster+Two%7CMerienda');
@import url('https://fonts.googleapis.com/css?family=Anton%7CMarkazi+Text%7CPT+Sans+Narrow');
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

        @endif
    </div>
    @else
        <div class="center jumbotron" style="background:rgba(0,0,0,0.0); font-family: 'Lobster', cursive;">
            <div class="text-center">
                <h1 style= "font-family: 'Anton', cursive;">Welcome To The</h1>
                <h1 style= "font-family: 'Anton',cursive;">RIPPO</h1>
                <h1 style= "font-family: '', cursive;">:)</h1>
                <h2 style="font-family: 'Playdair Display', serif;">Have you ever felt like you are not motivated to write a daily report?<br>
<br>Here we can provide the solution to that. <br>

<br>Rippo is a pleasing function which you can enjoy writing your Daily Report.<br>

<br>On Rippo, you can follow your favorite doukis and you can easily give them feedbacks and likes! <br>

<br>You can also see how many doukis are following you on a visualized graphics. <br>

<br>There's also a comment bot that could boost up your motivation on smart goals!! <br>

<br>Sign up now and enjoy your Nippo!</h2><br>

               
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-danger']) !!}

                <link href="signupbotton.css" rel="stylesheet" type="text/css">


<!--hover埋めたい-->


                
            </div>
        </div>
    @endif
@endsection