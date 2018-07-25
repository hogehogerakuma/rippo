@extends('layouts.app')

@section('content')
<div class="Qoo col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:0px; padding-bottom:20px;">
        @include('user_follow.follow_button', ['user' => $user])
            <ul class="nav nav-tabs">
               <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href="{{ route('users.followings', ['id' => $user->id]) }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFollowings&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span class="badge">{{ $count_followings }}</span></a></li>
               <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href="{{ route('users.followers', ['id' => $user->id]) }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFollowers&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span class="badge">{{ $count_followers }}</span></a></li>
            </ul>
          <div class="col-sm-8">
              <div class="follower" style="margin-top:10px;">
          @include('users.users', ['users' => $users])
          </div>
          </div>
@endsection