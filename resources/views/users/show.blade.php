@extends('layouts.app')

@section('content')


<style>
@import url('https://fonts.googleapis.com/css?family=Caveat%7CDancing+Script%7CGaegu%7CGreat+Vibes%7CLobster+Two');
</style>


@if (Auth::id() != $user->id)
<h1 style= "font-family: 'Merienda' , Cursive;">&nbspThis is <?php print $user->username?>'s Calendar</h1>
@endif


@include('commons.curdateiine')

@include ('commons.otherscalendar')
<a href="{{route('reports.reports', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button" style="font-family: 'Lobster', cursive;" >User's page</a>




<div class="col-lg-12">
    <ul class="nav nav-tabs">
        <li role="activate" style="color:white;"><a href='{{route('reports.reports', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Reports&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
        <!--<li role="activate" style="color:white;"><a href='{{route('users.comments', ['id' => $user->id])}}'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMy Comments&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>-->
                  
    <div class="panel panel-default col-lg-12 col-md-8 col-sm-12 col-xs-12" style="padding-top:20px;">
                @if (count($reports) > 0)
                    @include('reports.reports', ['reports' => $reports])
                @endif
                </div>
            </div>
            </ul>
            
            <!--<div class="col-xs-8">-->
            <!--    <h3>My Replies</h3>-->
            <!--    @if (count($comments) > 0)-->
            <!--        @include('comments.comments', ['comments' =>$comments])-->
            <!--    @endif-->
            <!--</div>-->
    </div>

@endsection