@if (Auth::user()->is_favoriting($report->id))
    {!! Form::open(['route' => ['user.unfavorite', $report->id], 'method' => 'delete', 'style'=>'display:inline-block;']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-warning btn-xs"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['user.favorite', $report->id],'style'=>'display:inline-block;']) !!}
        {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-xs"]) !!}
    {!! Form::close() !!}
@endif    
