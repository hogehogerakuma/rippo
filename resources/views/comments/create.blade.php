<div class="col-xs-10" style= "font-family: 'Merienda', cursive;">
    
    {!! Form::open(['route' => ['user.comment', $report->id]]) !!}

     <div class="form-group">
        {!! Form::label('comment', '■ Wanna reply?? Why not!! ■') !!}
        {!! Form::text('comment', null, ['class' => 'form-control']) !!}    
     </div>
            
     {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
     {!! Form::close() !!}    
</div>            