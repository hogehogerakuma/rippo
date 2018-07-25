@extends('layouts.app')

<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>


@section('content')
    <div class="text-center" style= "color:black; font-family: 'Lobster', cursive;">
        <br>
        <br>
        <br>
        <br>
        <br>
    
        <h1>Sign up</h1>
    </div>

    <div class="row" style= "color:black; font-family: 'Lobster', cursive;">
        <div class="col-md-6 col-md-offset-3" style="margin-top:8px;">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Sign up', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection