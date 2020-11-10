<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('general.login');
    }

    public function proses_login(Request $request){

        // dd($request);

        //validate form login to has to inputted by any value
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        //take input
        $kredensil = $request->only('username','password');

        //separator level
        if(Auth::attempt($kredensil)){
            $user = Auth::user();
            if($user->level == 'admin'){
                return redirect()->intended('admin');
            }else if($user->level == 'siswa'){
                return redirect()->intended('siswa');
            }
            return redirect()->intended('/');
        }
        return redirect('/');
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
