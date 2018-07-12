@extends('layouts.app')

@section('content')
    @if (Auth::check())
<div class="row">
    <div class="col-xs-8">
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
</div>
    @else
        <div class="center jumbotron" style="background:rgba(0,0,0,0.0);">
            <div class="text-center">
                <h1>Welcome To The</h1>
                <h1>RIPPO:)</h1><br>
                <h4>Havana, ooh na-na (ay)Half of my heart is in Havana, ooh-na-na (ay, ay)He took me back to East Atlanta, na-na-na</h4>
                <h4>Oh, but my heart is in Havana (ay)There's somethin' 'bout his manners (uh huh)Havana, ooh na-na (uh)</h4>
                <h4>He didn't walk up with that "how you doin'?" (uh)(When he came in the room)</h4><br>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-danger']) !!}
            </div>
        </div>
    @endif
@endsection