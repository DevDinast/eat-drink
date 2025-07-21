<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nom_entreprise' => ['required', 'string', 'max:255'],
        'nom_responsable' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'password_confirmation' => ['required'],
        'telephone' => ['required', 'regex:/^0[0-9]{9}$/'],
        'nom_stand' => ['required', 'string', 'max:255'],
        'description_stand' => ['required', 'string', 'max:255'],

    ]);

    $user = User::create([
        'nom_entreprise' => $request->nom_entreprise,
        'nom_responsable' => $request->nom_responsable,
        'telephone' => $request->telephone,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'entrepreneur_en_attente',
        'statut' => 'en_attente',
    ]);

    // Optionnel : Auth::login($user);

    event(new Registered($user));

    return redirect()->route('en_attente');
}

}