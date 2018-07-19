@extends('layouts.app')
@section('content')

<div class="panel panel-default col-lg-7 col-md-7 col-sm-12 col-xs-12" style="padding-top:20px; padding-bottom:20px; margin-left:15px;"> 
    <div class="media-left">
        <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 50) }}" alt="">
    </div>
            <div class="media-body" style="padding-top: 10px; padding-bottom:20px;">
                <div>
                    {!! link_to_route('users.show', $user->username, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $report->created_at }}</span>
                </div>
            <div>
                    <h4 style = "color:black;"><b>Thoughts on Today</b></h4>
                    <p style= "color:black;">{!! nl2br(e($report->content)) !!}</p>
                    <br>
                    <h4 style = "color:black;"><b>1. GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->goal_1)) !!}</p>
                    <p style="color:red;">→{!! nl2br(e($report->result_1)) !!}%</p>
            
                    <!--空欄の要素は表示しない-->
                    @if (count($report->goal_2) != 0) 
                        <h4 style= "color:black;" ><b>2. GOAL</b></h4>
                        <p style="color:black;">>>{!! nl2br(e($report->goal_2)) !!}</p>
                        <p style="color:red;">→{!! nl2br(e($report->result_2)) !!}%</p>
                
                    @endif
                
                    @if (count($report->goal_3) != 0) 
                        <h4 style="color:black;"><b>3. GOAL</b></h4>
                        <p style="color:black;">>>{!! nl2br(e($report->goal_3)) !!}</p>
                        <p style="color:red;">→{!! nl2br(e($report->result_3)) !!}%</p>
                    @endif
                
                    <br>
                    <h4 style="color:black;"><b>1. SMART GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->object_1)) !!}</p>
                
                    @if (count($report->object_2) != 0) 
                        <h4 style = "color:black;"><b>2. SMART GOAL</b></h4>
                        <p style="color:black;">>>{!! nl2br(e($report->object_2)) !!}</p>
                
                    @endif
                
                    @if (count($report->object_3) != 0) 
                        <h4 style="color:black;"><b>3. SMART GOAL</b></h4>
                        <p style="color:black;">>>{!! nl2br(e($report->object_3)) !!}</p>
                        <br>                
                    @endif
            </div>
    </div>
    </div>
@endsection