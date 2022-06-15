<?php

namespace App\Http\Controllers;

use App\Models\libros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "usuario" => ["required"],
            "password" => ["required"],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view("inicio")->with("librosController", libros::paginate(25));
        }
    }
}
