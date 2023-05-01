<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile(User $akun) {
        return view('profile-posts', ['username'=>$akun->username]);
    }
    public function signout(){
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged in!!');
    }
    public function showCorrectHomepage(){
        if (auth()->check()) {
            return view('homepage-feed');
        } 
        else {
            return view('home');
        }
    }
    public function login(Request $request) {
        $dataMasuk = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['username'=>$dataMasuk['loginusername'], 'password'=>$dataMasuk['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You have successfully logged in!!');
        }
        else{
            return redirect('/')->with('failure', 'Invalid Log In!');
        }
    }
    public function register(Request $request){
        $dataMasuk = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $dataMasuk['password'] = bcrypt($dataMasuk['password']);

        $akun = User::create($dataMasuk);
        auth()->login($akun);
        return redirect('/')->with('success', 'Thank You For Creating an Account');
    }
}
