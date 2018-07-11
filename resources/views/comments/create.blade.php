<div class="col-xs-10">
    
    {!! Form::open(['route' => ['user.comment', $report->id]]) !!}

     <div class="form-group">
        {!! Form::label('comment', '■ Wanna reply?? Why not!! ■') !!}
        {!! Form::text('comment', null, ['class' => 'form-control']) !!}    
     </div>
            
     {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
     {!! Form::close() !!}    
</div>            