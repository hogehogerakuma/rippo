@if (Auth::user()->is_favoriting($m->id))
    {!! Form::open(['route' => ['user.unfavorite', $m->id], 'method' => 'delete', 'style'=>'display:inline-block;']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-success btn-xs"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['user.favorite', $m->id],'style'=>'display:inline-block;']) !!}
        {!! Form::submit('Favorite', ['class' => "btn btn-outline-dark btn-xs"]) !!}
    {!! Form::close() !!}
@endif    
