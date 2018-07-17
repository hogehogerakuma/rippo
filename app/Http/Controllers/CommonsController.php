<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CommonsController extends Controller
{
    public function show($id)
    {
     $user = User::find($id);
     $reports = $user->reports()->orderBy('created_at', 'desc')->paginate(10);
     
     return view('commons.calendar', ['user'=> $user]);   
    }
}
