<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthRegController extends Controller
{
    public function indexRegistr(){
        return view('registr');
    }

    public function registr(Request $request){
        $registr = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|min:11',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:50',
            'bank' => 'required'
        ]);

        if($registr->fails()){
            return back()->withErrors($registr);
        }
        User::create(['name' => $request->name, 'phone' => $request->phone, 'email' => $request->email, 'password' => Hash::make($request->password), 'bank' => $request->bank]);
           return redirect()->route('login_form');
    }

    public function indexLogin(){
        return view('vxod');
    }

    public function login(Request $request){
        $login = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|min:8'
        ]);

        if($login->fails()){
            return back()->withErrors($login);
        }
        if(!Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){
            return back()->withErrors('takova polzovatelya ne sushestvuet');
        }
        return redirect()->route('accaunt');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

}
