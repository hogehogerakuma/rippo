@extends('layouts.app')

@section('content')


<style>
@import url('https://fonts.googleapis.com/css?family=Caveat|Dancing+Script|Gaegu|Great+Vibes|Lobster+Two');
</style>


@if (Auth::id() != $user->id)
<h1 style= "font-family: 'Merienda' , Cursive;">&nbspThis is <?php print $user->username?>'s Calendar</h1>
@endif


@include('commons.curdateiine')

@include ('commons.otherscalendar')
<a href="{{route('reports.reports', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button" style="font-family: 'Lobster', cursive;" >User's page</a>



@endsection