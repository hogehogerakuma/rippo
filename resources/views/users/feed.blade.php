@if (Auth::check())
<?php $bgimage = '/images/hosizora.jpg'; ?>
@endif

@extends('layouts.app')
@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Fjalla+One%7CLobster%7COswald:500%7CRoboto+Condensed');
</style>

@foreach ($reports as $report)
<div class="Qoo col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:0px; padding-bottom:20px;">
    <ul class="nav nav-tabs">
        <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href='{{route('home')}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-th-list"></span>&nbsp&nbspDoukie's FEED&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
        <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href='{{route('home')}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-tags"></span>&nbsp&nbspFollowings Feed&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                
        <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px; font-family: 'Gaegu', cursive;">
            @if (count($reports) > 0)
                @include('reports.reports', ['report' => $report, 'user' => $user])
            @endif
        </div>
    </ul>
</div>
@endforeach
@endsection