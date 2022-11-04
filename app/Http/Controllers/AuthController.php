<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function view(){
        return view('form.auth');
    }
    public function login(Request $request){

        $rules = [
            'email' =>'required|email',
            'password' =>'required'
        ];
        $messages = [
            'email.required'    => 'E-mail wajib diisi',
            'email.email'       => 'E-mail wajib nu baleg',
            'password.required' => 'Password wajib diisi',
        ];

        $Validator = Validator::make($request->all() ,$rules ,$messages);

        if ($Validator->fails()){
            return redirect()->back()->withErrors($Validator)->withInput($request->all);
    }
    $data =[
        'email' => $request->email,
        'password' => $request->password,
    ];
    if($request->has('remember')){
        $remember = true;
    } else {
        $remember = false;
    }

    Auth::attempt($data, $remember);

    if(Auth::check()) {
        return redirect()->to('/');
    }

    return redirect()->back()->withErrors([
        'error' => 'Email / Password salah'
    ])->withInput($request->all);

    }
    public function logout(){
        Auth::logout();
        return redirect()->to('/login');
    }
}
