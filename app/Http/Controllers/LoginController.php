<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Valider les identifiants
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Tenter de connecter
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // 3. Si le statut n'est pas "approuve", on déconnecte et redirige avec le statut
            if ($user->statut !== 'approuve') {
                $statut = $user->statut;
                Auth::logout();
                return redirect()->route('en_attente')->with('statut', $statut);
            }

            // 4. Redirection selon le rôle
            if ($user->role === 'entrepreneur') {
                return redirect()->route('entrepreneur.dashboard');
            }

            if ($user->role === 'admin') {
                return redirect()->route('admin.demandes');
            }
        }

        // 5. Erreur : identifiants incorrects
        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->onlyInput('email');
    }
}
