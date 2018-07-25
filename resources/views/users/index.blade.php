@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
@extends('layouts.app')


@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
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

<div class="panel panel-default col-lg-10 col-md-10 col-sm-12 col-xs-12" style="width:auto: height:auto; margin-left:110px; font-family: 'Lobster', cursive; margin-top:20px; margin-right:60px;">                
                    <div class="panel-body col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        @include('users.google', ['graph_data' => $graph_data])
                    </div>
</div>                    

@endsection