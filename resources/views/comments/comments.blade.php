<ul class="media-list">
@foreach ($comments as $comment)
    <?php $user = $comment->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->username, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->username, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($comment->comment)) !!}</p>
            </div>
        </div>
    </li>
@endforeach
</ul>