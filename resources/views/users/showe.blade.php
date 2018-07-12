@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <aside class="col-lg-16 col-md-16 col-sm-16 col-xs-16">
    
    <?php

    $number = mt_rand(1, 100);
    

    if ($number > 99) {
        print '今日の達成率'. $number . '% おめでとう！' . PHP_EOL;
    }
    
    elseif ($number >= 80) {
        print '今日の達成率'. $number . '% あとちょっとだね！' . PHP_EOL;
    }
    
    elseif ($number >= 60) {
        print '今日の達成率'. $number . '% この調子だね！' . PHP_EOL;
    }
    
    elseif ($number >= 40) {
        print '今日の達成率'. $number . '% がんばって～！' . PHP_EOL;
    }
    
     elseif ($number >= 1) {
        print '今日の達成率'. $number . '%って、、やる気あるの？？' . PHP_EOL;
    }
    
    else {
        print '今日の達成率'. $number . '% おめでとう！' . PHP_EOL;
    }
?>    

<?php
            date_default_timezone_set('Asia/Tokyo');
            $now_month =  (int)date("m");
            $now_date = (int)date("d");
        ?>
<?php



    $popopo = App\Report::whereDate('created_at', DB::raw('CURDATE()'))->where('user_id', $user->id)->get();
    if (isset ($popopo) && count($popopo)>0 ) {
        $dashitaka = '既に日報は提出済みです';
    }
    else {
        $dashitaka =  '日報を出してください。';
    }
?>
        
        <h2>&nbspこんにちは。今日は<?php print $now_month; ?>月<?php print $now_date; ?>日です。</h2>
        <h2>&nbsp<?php print $user->username; ?>さん,<?php print $dashitaka; ?></h2>
        
                
           
        @include('commons.calendar')
       
        </aside>
        
         <div class="col-xs-8">
            @if (count($reports) > 0)
                @include('reports.reports', ['reports' => $reports])
            @endif
        </div>
    </div>
    </div>
@endsection 