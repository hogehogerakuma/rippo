@extends('layouts.app')

@section('content')
<ul class="nav nav-pills mb-4" id="pills-tab" role="tablist" style="margin-left:30px;">
    <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href="{{ route('users.followings', ['id' => $user->id]) }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFollowings &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="badge">{{ $count_followings }}</span></a></li>
    <li role="activate" style="color:yellow; font-family: 'Lobster', cursive; font-size:20px; "><a href="{{ route('users.followers', ['id' => $user->id]) }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFollowers &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="badge">{{ $count_followers }}</span></a></li>
</ul>
<div class="col-sm-8" style="margin-top:10px;">
    @include('users.users', ['users' => $users])
</div>
@endsection