<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StandController extends Controller
{
    // Affiche le formulaire de création de stand
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour créer un stand.');
        }

        return view('stand_create');
    }

    // Enregistre un nouveau stand
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour créer un stand.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = Auth::user();

        // Vérifie si l'utilisateur a déjà un stand
        if ($user->stand) {
            return redirect()->route('dashboard_Entrepreneure')->with('error', 'Vous avez déjà un stand.');
        }

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('stands', 'public');
        }

        Stand::create([
            'user_id' => $user->id,
            'nom' => $request->nom,
            'description' => $request->description,
            'photo' => $photoPath,
            'statut' => 'approuve', // Important pour affichage dans exposants
        ]);

        return redirect()->route('dashboard_Entrepreneure')->with('success', 'Stand créé avec succès.');
    }

    // Formulaire de modification du stand
    public function edit()
    {
        $stand = Auth::user()->stand;

        if (!$stand) {
            return redirect()->route('stand_create')->with('error', 'Aucun stand à modifier.');
        }

        return view('stand_edit', compact('stand'));
    }

    // Mise à jour du stand
    public function update(Request $request)
    {
        $stand = Auth::user()->stand;

        if (!$stand) {
            return redirect()->route('stand_create')->with('error', 'Aucun stand trouvé.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo
            if ($stand->photo) {
                Storage::disk('public')->delete($stand->photo);
            }

            $stand->photo = $request->file('photo')->store('stands', 'public');
        }

        $stand->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'photo' => $stand->photo ?? null,
        ]);

        return redirect()->route('dashboard_Entrepreneure')->with('success', 'Stand mis à jour.');
    }

    // Suppression du stand
    public function destroy()
    {
        $stand = Auth::user()->stand;

        if ($stand) {
            if ($stand->photo) {
                Storage::disk('public')->delete($stand->photo);
            }
            $stand->delete();
        }

        return redirect()->route('dashboard_Entrepreneure')->with('success', 'Stand supprimé.');
    }
}
