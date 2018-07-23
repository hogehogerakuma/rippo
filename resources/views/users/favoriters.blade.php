@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>
    
<h3 style="font-family: 'Lobster', cursive;">&nbsp&nbsp&nbspThe person who likes your Daily Report</h3><br>


<ul class="media-list">
@foreach ($reports as $report)
<li class="container col-lg-9 col-md-19 col-sm-12 col-xs-12">
<div class="panel panel-default col-lg-9 col-md-9 col-sm-12 col-xs-12" style="color:black; padding-top:20px; padding-bottom:20px; font-family: 'Lobster', cursive;"> 
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($report->favoriters, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {{ $report->favoriters }}
            </div>
            <div>
                <p>{!! link_to_route('reports.reports', 'View profile', ['id' => $user->id]) !!}</p>
            </div>
        </div>
    </div>
  </li>
@endforeach
</ul>

@endsection