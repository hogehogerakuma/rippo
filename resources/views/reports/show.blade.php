@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
@extends('layouts.app')
@section('content')

<style>
@import url('https://fonts.googleapis.com/css?...');
@import url('https://fonts.googleapis.com/css?...');
</style>

<div class="panel panel-default col-lg-7 col-md-7 col-sm-12 col-xs-12" style="font-family: 'Roboto Condensed', sans-serif; padding-top:20px; padding-bottom:20px; margin-left:15px;"> 
    <div class="media-left">
        <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 50) }}" alt="">
    </div>
            <div class="media-body" style="padding-top: 10px; padding-bottom:20px;">
                <div>
                    {!! link_to_route('users.show', $user->username, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $report->created_at }}</span>
                </div>
            <div>
                    <h4 style = "color:black; font-family: 'Roboto Condensed', sans-serif;"><b>Thoughts on Today</b></h4>
                    <p style= "color:black; font-family: 'Roboto Condensed', sans-serif;">{!! nl2br(e($report->content)) !!}</p>
                    <br>
                    <h4 style = "color:black; font-family: 'Roboto Condensed', sans-serif;"><b>1. GOAL</b></h4>
                    <p style="color:black; font-family: 'Roboto Condensed', sans-serif;">>>{!! nl2br(e($report->goal_1)) !!}</p>
                    <p style="color:red; font-family: 'Roboto Condensed', sans-serif;">→{!! nl2br(e($report->result_1)) !!}%</p>
            
                    <!--空欄の要素は表示しない-->
                    @if (isset($report->goal_2)) 
                        <h4 style= "color:black; font-family: 'Roboto Condensed', sans-serif;" ><b>2. GOAL</b></h4>
                        <p style="color:black; font-family: 'Roboto Condensed', sans-serif;">>>{!! nl2br(e($report->goal_2)) !!}</p>
                        <p style="color:red; font-family: 'Roboto Condensed', sans-serif;">→{!! nl2br(e($report->result_2)) !!}%</p>
                
                    @endif
                
                    @if (isset($report->goal_3)) 
                        <h4 style="color:black; font-family: 'Roboto Condensed', sans-serif;"><b>3. GOAL</b></h4>
                        <p style="color:black; font-family: 'Roboto Condensed', sans-serif;">>>{!! nl2br(e($report->goal_3)) !!}</p>
                        <p style="color:red; font-family: 'Roboto Condensed', sans-serif;">→{!! nl2br(e($report->result_3)) !!}%</p>
                    @endif
                
                    <br>
                    <h4 style="color:black; font-family: 'Roboto Condensed', sans-serif;"><b>1. SMART GOAL</b></h4>
                    <p style="color:black; font-family: 'Roboto Condensed', sans-serif;">>>{!! nl2br(e($report->object_1)) !!}</p>
                
                    @if (isset($report->object_2)) 
                        <h4 style = "color:black; font-family: 'Roboto Condensed', sans-serif;"><b>2. SMART GOAL</b></h4>
                        <p style="color:black; font-family: 'Roboto Condensed', sans-serif;">>>{!! nl2br(e($report->object_2)) !!}</p>
                
                    @endif
                
                    @if (isset($report->object_3)) 
                        <h4 style="color:black; font-family: 'Roboto Condensed', sans-serif;"><b>3. SMART GOAL</b></h4>
                        <p style="color:black; font-family: 'Roboto Condensed', sans-serif;">>>{!! nl2br(e($report->object_3)) !!}</p>
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
                        <a href="{{route('home')}}" class="btn btn-info btn- btn-xs" role="button">Home</a>
    
                    </div>
    </div>
    </div>
    <div class="panel panel-default col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-left:30px; margin-top:-20px font-family: 'Merienda', cursive;"> 
                <h2 style= "font-family: 'Lobster', cursive; color:black;">Replies</h2>
<br>
                @include('comments.comments', ['comments' =>$comments])

    </div>
    <div style="font-family: 'Merienda', cursive;">
    @include('comments.create', ['report' => $report])
    </div>
@endsection