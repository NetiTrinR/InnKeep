<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id){
        dd(User::find($id));
        return view('user.show')->with('user', User::find($id));
    }

    public function edit($id){
        dd(User::find($id));
        return view('user.edit')->with('user', User::find($id));
    }

    public function update(Request $request, $id){
        dd($request, $id);
    }
}
