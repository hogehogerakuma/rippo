@extends('layouts.app')

@section('content')

<?php
    date_default_timezone_set('Asia/Tokyo');
    $now_month =  (int)date("m");
    $now_date = (int)date("d");
?>
    
    <p><?php print $now_month; ?>月<?php print $now_date; ?>日の日報作成ページ</p>
        
<div class="row">
    <div class="col-xs-6">
    {!! Form::model($report, ['route' => 'reports.store']) !!}
        
        <div class="form-group">
         {!! Form::label('content', '■ Thoughts on Today ■') !!}
         {!! Form::text('content', null, ['class' => 'form-control']) !!}    
        </div>
        
        <div class="form-group">
         {!! Form::label('goal', '■ Yesterday goal ■') !!}
         {!! Form::text('goal', null, ['class' => 'form-control']) !!}    
        </div>
        
        <div class="form-group">
         {!! Form::label('result_1', '■ Result1 ■') !!}
         {!! Form::text('result_1', null, ['class' => 'form-control']) !!}   
        </div>
        
        <div class="form-group">
         {!! Form::label('goal_1', '■ SMART GOAL1/Reason ■') !!}
         {!! Form::text('goal_1', null, ['class' => 'form-control']) !!}   
        </div>
       
       {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    </div>
</div>    

@endsection