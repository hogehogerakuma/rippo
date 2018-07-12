@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="row">

        <div class="panel panel-default col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->username }}</h3>
                </div>
                
                <div class="panel-body col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    @include('users.google', ['graph_data' => $graph_data])
                </div>

                </div>
         
         <div class="col-xs-8">

            @if (count($reports) > 0)
                @include('reports.reports', ['reports' => $reports])
            @endif
        </div>
        <div class="col-xs-8">
            <h3>Your replies</h3>
            @if (count($comments) > 0)
                @include('comments.comments', ['comments' =>$comments])
            @endif
        </div>
=======
        <div class="row">
                <div class="panel panel-default col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $user->username }}</h3>
                    </div>
                    <div class="panel-body col-lg-3 col-md-3 col-sm-4 col-xs-3">
                        @include('users.google', ['graph_data' => $graph_data])
                    </div>
                </div>
                
             <div class="col-lg-offset-1 col-lg-7 col-md-offset-1 col-md-6 col-sm-8 col-xs-12">
                @if (count($reports) > 0)
                    @include('reports.reports', ['reports' => $reports])
                @endif
            </div>
            <div class="col-xs-8">
                <h3>Your replies</h3>
                @if (count($comments) > 0)
                    @include('comments.comments', ['comments' =>$comments])
                @endif
            </div>
>>>>>>> bb77ea20d8e5e9c82f80d299956fcf067b01f51a
    </div>
@endsection