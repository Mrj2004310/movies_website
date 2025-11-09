<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(Request $request){
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return redirect()->route('index');
    }

    public function login(Request $request){
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
    }

}
