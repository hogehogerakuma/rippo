@extends('layouts.app')

@section('content')
      
               <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist" style="margin-left:30px;">
                <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                 </ul>
                 <div class="col-sm-8" style="margin-top:10px;">
            @include('users.users', ['users' => $users])
               </div>
@endsection