@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
@extends('layouts.app')


@section('content')



<style>
@import url('https://fonts.googleapis.com/css?family=Caveat|Dancing+Script|Gaegu|Great+Vibes|Lobster+Two');
</style>


@if (Auth::id() != $user->id)
<h1 style= "font-family: 'Merienda' , Cursive;">&nbspThis is <big><big><?php print $user->username?></big></big>'s Calendar</h1>
@endif


@if (Auth::id() != $user->id)
@include('user_follow.follow_button', ['user' => $user])
@include ('commons.otherscalendar')
<a href="{{route('reports.reports', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button" style="font-family: 'Lobster', cursive;" >User's page</a>

@else
@include ('commons.calendar')
<a href="{{route('reports.reports', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button" style="font-family: 'Lobster', cursive;" >User's page</a>

@endif

@endsection