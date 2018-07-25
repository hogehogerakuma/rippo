@if (Auth::check())
<?php
$bgimage = '/images/hosizora.jpg';
?>
@endif
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
    <div class="date col-xs-12">
    <p style= "font-size:40px; font-family: 'Roboto Condensed', sans-serif;"><?php print $now_month; ?>&nbsp/&nbsp<?php print $now_date; ?> Posting Page</p>
    </div>    
        
<div class="row" style="font-size:20px; font-family: 'Roboto Condensed', sans-serif;">
    <div class="col-xs-11">
    {!! Form::model($report, ['route' => 'reports.store']) !!}
    <div class="form group row col-lg-12">
        <div class="form-group col-xs-12">
         <br>
         {!! Form::label('content', '■ Thoughts on Today ■') !!}
         </div>
         <div class="form-group col-lg-12">
         {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '10']) !!}
         <br>
        </div>
        
        <div class="form-group col-xs-12">
           {!! Form::label('goal_1', '■ Goal of Today1 ■') !!}
       </div>
           <div class="form-group col-xs-9">
           {!! Form::text('goal_1', null, ['class' => 'form-control']) !!}    
          </div>
       <div class="form-group form-inline" style='display:inline-block'>
           {!! Form::text('result_1', null, ['class' => 'form-control']) !!}%
        </div>
      
        <div class="form-group col-xs-12">
           {!! Form::label('goal_2', '■ Goal of Today2 ■') !!}
       </div>
           <div class="form-group col-xs-9">
           {!! Form::text('goal_2', null, ['class' => 'form-control']) !!}    
          </div>
       <div class="form-group form-inline" style='display:inline-block'>
           {!! Form::text('result_2', null, ['class' => 'form-control']) !!}%
        </div>
      
        <div class="form-group col-xs-12">
           {!! Form::label('goal_3', '■ Goal of Today3 ■') !!}
        </div>
           <div class="form-group col-xs-9">
           {!! Form::text('goal_3', null, ['class' => 'form-control']) !!}    
          </div>
       <div class="form-group form-inline" style='display:inline-block'>
           {!! Form::text('result_3', null, ['class' => 'form-control']) !!}%
        </div>
      
        <div class="form-group col-xs-12">
         <br>
         {!! Form::label('object_1', '■ SMART GOAL1/Reason ■') !!}
         </div>
         <div class="form-group col-xs-12">
         {!! Form::textarea('object_1', null, ['class' => 'form-control', 'rows' => '2']) !!}   
        </div>
        
        <div class="form-group col-xs-12">
         {!! Form::label('object_2', '■ SMART GOAL2/Reason ■') !!}
         </div>
         <div class="form-group col-xs-12">
         {!! Form::textarea('object_2', null, ['class' => 'form-control', 'rows' => '2']) !!}   
        </div>
        
        <div class="form-group col-xs-12">
         {!! Form::label('object_3', '■ SMART GOAL3/Reason ■') !!}
         </div>
         <div class="form-group col-xs-12">
         {!! Form::textarea('object_3', null, ['class' => 'form-control', 'rows' => '2']) !!}   
        </div>
        
        <div class="form-check col-xs-12">
         <input type="checkbox" class="form-check-input" id="exampleCheck1">
         <label class="form-check-label" for="exampleCheck1"  style="font-size:15px;">終業時間になったことを確認しました。</label>
        </div>
       <div class="button col-xs-12">
        <br>
       {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
</div>
    {!! Form::close() !!}
    </div>
    </div>
</div>    

@endsection