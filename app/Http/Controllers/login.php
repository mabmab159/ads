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
            return redirect(route("inicio"))->with("libros", libros::paginate(25));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect("/");
    }
}
