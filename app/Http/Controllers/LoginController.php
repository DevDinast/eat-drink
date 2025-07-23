<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function redirectUser()
{
    $user = session('user');

    if (!$user) {
        return redirect('/login');
    }

    if ($user['role'] === 'admin') {
        return redirect()->route('demande');
    }

    if ($user['statut'] === 'valide') {
        return view('dashboard_Entrepreneure');
    }

    return view('en_attente');
}

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Traitement de la tentative de connexion
    public function login(Request $request)
    {
        // Validation des champs
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tentative d'authentification
        if (Auth::attempt($credentials)) {
            // Régénère la session pour des raisons de sécurité
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirection selon le statut de l'utilisateur
            if ($user->statut !== 'approuve') {
                // Ne PAS déconnecter l'utilisateur, garder la session active
                return redirect()->route('en_attente')->with('error', 'Votre compte n’est pas encore approuvé.');
            }

            // Redirection selon le rôle
            if ($user->role === 'entrepreneur') {
                return redirect()->route('dashboard_Entrepreneure');
            }

            if ($user->role === 'admin') {
                return redirect()->route('demande');
            }

            // Cas par défaut
            return redirect('/');
        }

        // Si échec de connexion
        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->onlyInput('email');
    }
}
