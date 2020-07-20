<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;


class UserController extends Controller
{
    //create a city
    public function create(Request $req){

        //validate user input
        $validator =  Validator::make($req->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => ['required'],
            'password' => [
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }


        $user = new User;

        $user->email = $req->input('email');
        $user->name = $req->input('name');
        $user->password = $req->input('password');
        $user->save();

        return $user;
    }

    public function update(Request $req, $id){
        //validate user input
        $validator =  Validator::make($req->all(), [
            'email' => 'required|email',
            'name' => ['required'],
            'password' => [
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $user= User::where('id', $id)->first();
        $user->email = $req->input('email');
        $user->name = $req->input('name');
        $user->password = $req->input('password');
        $user->save();
            
        return $user;
        


    }
}
