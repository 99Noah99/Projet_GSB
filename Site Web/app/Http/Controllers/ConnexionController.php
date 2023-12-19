<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ConnexionController extends Controller
{
    public function connexion(){
        $credentials = request()->only('username', 'password');
        $auth = Auth::attempt($credentials, true);
        if ($auth) {
            Session::regenerate();
            return redirect()->route('accueil');
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


    public function show_create_account(){
        return view('create_account');
    }

    
    public function create_account(){
        // dd(request()->all());
        User::create([
            "Nom" => request()->Nom,
            "Prenom" => request()->Prenom,
            "Email" => request()->mail,
            "username" => request()->username,
            "password" => Hash::make(request()->password),
            "Id_Fonction" => 2
        ]);
        return redirect()->route('login');
    }
    
}
