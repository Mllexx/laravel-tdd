<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function show($name){
        ## $user =  User::where('name',$name)->first();
        $user =  User::findByName($name);
        $tweets = $user->tweets;
        return view('users.show',['tweets'=>$tweets]);
    }
}
