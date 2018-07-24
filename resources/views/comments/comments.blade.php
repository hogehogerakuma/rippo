@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
@extends('layouts.app')

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>

<ul class="media-list" style="font-family: 'Merienda', cursive;">
@foreach ($comments as $comment)
    <?php $user = $comment->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($comment->user->username, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->username, ['id' => $comment->user->id]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
            </div>
            <div>
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
    </li>
@endforeach
</ul>