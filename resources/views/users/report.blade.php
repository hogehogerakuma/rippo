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
<div class="row col-lg-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
<div class="panel panel-default col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left:auto;margin-right:auto; padding-top:20px; padding-bottom:20px;">
<ul class="media-list" style="font-family: 'Roboto Condensed', sans-serif;">

    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 50) }}" alt="">
        </div>
        <div class="media-body">
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
                @if (isset($report->goal_2)) 
                    <h4 style= "color:black;" ><b>2. GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->goal_2)) !!}</p>
                    <p style="color:red;">→{!! nl2br(e($report->result_2)) !!}%</p>
                
                @endif
                
                @if (isset($report->goal_3)) 
                    <h4 style="color:black;"><b>3. GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->goal_3)) !!}</p>
                    <p style="color:red;">→{!! nl2br(e($report->result_3)) !!}%</p>
                
                @endif
                
                <br>
                <h4 style="color:black;"><b>1. SMART GOAL</b></h4>
                <p style="color:black;">>>{!! nl2br(e($report->object_1)) !!}</p>
                
                @if (isset($report->object_2)) 
                    <h4 style = "color:black;"><b>2. SMART GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->object_2)) !!}</p>
                
                @endif
                
                @if (isset($report->object_3)) 
                    <h4 style="color:black;"><b>3. SMART GOAL</b></h4>
                    <p style="color:black;">>>{!! nl2br(e($report->object_3)) !!}</p>
                    <br>                
                @endif
            </div>
            <div>
                @if (Auth::id() == $report->user_id)
                    {!! Form::open(['route' => ['reports.destroy', $report->id], 'method' => 'delete', 'style'=>'display:inline-block;']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                @include('user_favorite.favorite_button', ['report' => $report])
    
                <div style="color: black">
                    {!! link_to_route('reports.favoriters', 'いいね　'.$report->favCnt. '件', ['id' => $report->id, 'user' => $user, 'report' => $report]) !!}
                </div>
            </div>
          </div>
        </div>
    </div>
    </li>
</ul>
@endsection