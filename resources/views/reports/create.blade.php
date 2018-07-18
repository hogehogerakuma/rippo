@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>

<?php
    date_default_timezone_set('Asia/Tokyo');
    $now_month =  (int)date("m");
    $now_date = (int)date("d");
?>
    
    <p style= "font-family: 'Merienda', cursive;"><?php print $now_month; ?>&nbsp/&nbsp<?php print $now_date; ?> Posting Page</p>
        
<div class="row" style="font-family: 'Merienda', cursive;">
    <div class="col-xs-10">
    {!! Form::model($report, ['route' => 'reports.store']) !!}
    
        <div class="form-group">
         {!! Form::label('content', '■ Thoughts on Today ■') !!}
         {!! Form::text('content', null, ['class' => 'form-control', 'rows' => '2']) !!}    
        </div>
        
        <div class="form-group form-inline" style='display:inline-block'>
           {!! Form::label('goal_1', '■ Goal of Today1 ■') !!}
           {!! Form::text('goal_1', null, ['class' => 'form-control']) !!}    
         
           {!! Form::label('result_1', '■ Result1 ■') !!}
           {!! Form::text('result_1', null, ['class' => 'form-control']) !!}%
        </div>
        
        <div class="form-group form-inline" style="display:inline-block">
         {!! Form::label('goal_2', '■ Goal of Today2 ■') !!}
         {!! Form::text('goal_2', null, ['class' => 'form-control']) !!}    
        
         {!! Form::label('result_2', '■ Result2 ■') !!}
         {!! Form::text('result_2', null, ['class' => 'form-control']) !!}%   
        </div>
        
        <div class="form-group form-inline" style="display:inline-block">
         {!! Form::label('goal_3', '■ Goal of Today3 ■') !!}
         {!! Form::text('goal_3', null, ['class' => 'form-control']) !!}    
         
         {!! Form::label('result_3', '■ Result3 ■') !!}
         {!! Form::text('result_3', null, ['class' => 'form-control']) !!}%   
        </div>
        
        <div class="form-group">
         {!! Form::label('object_1', '■ SMART GOAL1/Reason ■') !!}
         {!! Form::text('object_1', null, ['class' => 'form-control']) !!}   
        </div>
        
        <div class="form-group">
         {!! Form::label('object_2', '■ SMART GOAL2/Reason ■') !!}
         {!! Form::text('object_2', null, ['class' => 'form-control']) !!}   
        </div>
        
        <div class="form-group">
         {!! Form::label('object_3', '■ SMART GOAL3/Reason ■') !!}
         {!! Form::text('object_3', null, ['class' => 'form-control']) !!}   
        </div>
        
        <div class="form-check">
         <input type="checkbox" class="form-check-input" id="exampleCheck1">
         <label class="form-check-label" for="exampleCheck1">終業時間になったことを確認しました。</label>
        </div>
       
       {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    </div>
</div>    

@endsection