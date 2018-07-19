@extends('layouts.app')

@section('content')
@include ('commons.otherscalendar')
<a href="{{route('reports.reports', ['id' => $user->id])}}" class="btn btn-success btn-lg btn-block" role="button" style="font-family: 'Lobster', cursive;" >User's page</a>
@include('users.users', ['users' => $users])
@endsection