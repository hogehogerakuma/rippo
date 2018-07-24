@extends('layouts.app')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>
<div class="row col-lg-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
<div class="panel panel-default col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left:auto;margin-right:auto; padding-top:20px; padding-bottom:20px;">
<ul class="media-list" style="font-family: 'Merienda', cursive;">
@foreach ($comments as $comment)
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->username, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
            </div>
            <div style="color:black">
                <p>{!! nl2br(e($comment->comment)) !!}</p>
            </div>
            <div>
                 @if (Auth::id() == $comment->user_id)
                    {!! Form::open(['route' => ['user.uncomment', $comment->id], 'method' => 'delete', 'style'=>'display:inline-block;']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
      </div>
     </div>    
    </li>
@endforeach
</ul>
@endsection