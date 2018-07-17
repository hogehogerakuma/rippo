@extends('layouts.app')

@section('content')
    <div class="row">
        
        <div class="col-xs-8">
            echo $favoriter_id; exit;
            <!--@include('users.users', ['users' => $favoriters])-->
        </div>
       
       foreach($favoriters as $favoriter) {
        echo $favoriter->username .PHP_EOL;
       }
    </div>
@endsection