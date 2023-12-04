<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ConnexionController extends Controller
{
    public function connexion(){
        $credentials = request()->only('username', 'password');
        $auth = Auth::attempt($credentials, true);
        if ($auth) {
            Session::regenerate();
            return redirect()->route('gestion');
        }else{
            return redirect()->route('login');
        }
    }

    public function show_login() {
        return view('login');
    }

    public function SeDeconnecter() {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login'); // redirect permet d'indiquer que il faut prendre la route
    }
    
}
