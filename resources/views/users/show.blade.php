@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-md-24">
            <div class="panel panel-default col-xs-4">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->username }}</h3>
                </div>
                <div class="panel-body">
                    @include('users.google', ['graph_data' => $graph_data])
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])

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
        
        <h1>&nbspこんにちは。今日は<?php print $now_month; ?>月<?php print $now_date; ?>日です。</h1>
        <h1>&nbsp<?php print $user->username; ?>さんは<?php print $dashitaka; ?></h1>
        @include('commons.calendar')
    
        </aside>
        <div class="col-xs-8">
            @if (count($reports) > 0)
                @include('reports.reportsontheday', ['reports' => $reports])
            @endif
        </div>
    </div>
@endsection 