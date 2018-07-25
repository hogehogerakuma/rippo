@extends('layouts.app')
<head></head>
<body>
<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu%7CLobster%7CLobster+Two%7CMerienda');
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
@import url('https://fonts.googleapis.com/css?family=Cabin+Condensed%7CCabin+Sketch%7CHind+Siliguri%7CNews+Cycle%7CVast+Shadow');
</style>
<link href="/css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" >
        
$(document).ready(function(){
$('#ani').hover(function(e){
e.preventDefault();
$('#ani').removeClass().addClass(' bounceInRight ' + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
$(this).removeClass();
                });
            });
        });
    </script>

@section('content')
<div id="ani" class="animated bounceInRight">
    <div class="text-center">
        <h1 style= "color:black; margin-top:120px; font-family: 'Cabin Sketch', cursive;">Log in</h1>
    </div>

    <div class="row" style= "color:black; font-family:'Roboto Condensed', sans-serif;">
        <div class="col-md-6 col-md-offset-3" style="margin-top:20px;">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Log in', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}

            <p style= "font-family: 'Lobster', cursive;">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
        </div>
    </div>
    </div>
    </body>
@endsection