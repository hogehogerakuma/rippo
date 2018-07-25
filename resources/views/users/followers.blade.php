@if (Auth::check())
<?php $bgimage = '/images/hosizora.jpg'; ?>
@endif

@extends('layouts.app')

@section('content')
<div class="row">
  <div class="Qoo col-lg-10 col-md-12 col-sm-12 col-xs-12" style="padding-top:0px; padding-bottom:20px;">
    @include('user_follow.follow_button', ['user' => $user])
    <nav class="navbar navbar-light bg-light">
      <form class="form-inline">
        <button class="btn btn-warning" type="button" style="color:white; font-family: 'Lobster', cursive; font-size:20px;"><a href="{{ route('users.followings', ['id' => $user->id]) }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFollowings&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span class="badge">{{ $count_followings }}</span></a></button>
        <button class="btn btn-warning" type="button" style="color:white; font-family: 'Lobster', cursive; font-size:20px;"><a href="{{ route('users.followers', ['id' => $user->id]) }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFollowers&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span class="badge">{{ $count_followers }}</span></a></button>
      </form>
    </nav>
  </div>
  <div class="follower" style="margin-top:0px;">
    @include('users.users', ['users' => $users])
  </div>
</div>              
@endsection