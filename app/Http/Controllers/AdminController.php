<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Affiche toutes les demandes d'entrepreneurs en attente.
     */
    public function index()
    {
        $demandes = User::where('role', 'entrepreneur_en_attente')
                        ->where('statut', 'en_attente')
                        ->get();

        return view('demande', compact('demandes'));
    }

    /**
     * Valide un entrepreneur.
     */
    public function valider($id)
{
    $user = User::findOrFail($id);

    // ✅ Mise à jour du statut et rôle
    $user->statut = 'approuve';
    $user->role = 'entrepreneur';
    $user->save();

    // ✅ Création automatique du stand si non existant
    if (!$user->stand) {
        $user->stand()->create([
            'nom' => $user->nom_entreprise ?? 'Stand de ' . $user->name,
            'description' => $user->description_entreprise ?? null,
            'statut' => 'approuve'
        ]);
    }

    return redirect()->back()->with('success', 'Utilisateur approuvé et stand créé avec succès.');
}


    /**
     * Rejette un entrepreneur.
     */
    public function rejeter($id)
    {
        $user = User::findOrFail($id);
        $user->statut = 'refuse';
        $user->save();

        return redirect()->back()->with('error', 'Utilisateur rejeté.');
    }
}
