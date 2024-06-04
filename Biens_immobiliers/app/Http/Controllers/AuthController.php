<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registerPost(Request $request){
        $user = new user();
        
        $user->name=$request->name;
        $user->email = $request->email;
        $user->password=Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Compte crée avec succés connectez vous');
    }

    public function login(){
        return view('login');
    }
    
}
