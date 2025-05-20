<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // show register page
    public function register()
    {
        // afficher la vue register
        return view('auth.register');
    }
    // handle register request
    public function handleRegister(RegisterRequest $request)
    {

        $user = User::query()->create($request->validated());
        // create a profile for the user
        $user->profile()->create([]);
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès! Vous pouvez maintenant vous connecter.');
    }


    public function login()
    {
        return view('auth.login');
    }

    // show login page
    public function handlelogin(LoginRequest $request)
    {
        // Authentication passed...
        $validated = $request->validated();
        $ok = Auth::attempt($validated);
        if ($ok) {
            session()->regenerate();


            // Check if the user is an admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index')->with('success', 'Bienvenue Admin!');
            }
            // Redirect to the home page or any other page
            return redirect()->route('home')->with('success', 'Vous êtes connecté avec succès!');
        }


        return redirect()->route('login')->withErrors(['email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.']);
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
