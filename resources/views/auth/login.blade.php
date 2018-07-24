@extends('layouts.app')
<head></head>
<body>
<style>
@import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
</style>

@section('content')
    <div class="text-center">
        <h1 style= "color:black; margin-top:120px; font-family: 'Lobster', cursive;">Log in</h1>
    </div>

    <div class="row" style= "color:black; font-family: 'Lobster', cursive;">
        <div class="col-md-6 col-md-offset-3" style="margin-top:20px;">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Log in', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}

            <p style= "font-family: 'Lobster', cursive;">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
        </div>
    </div>
    </body>
@endsection