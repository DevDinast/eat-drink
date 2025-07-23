<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class ProduitsController extends Controller
{
    // Vérification si l'utilisateur a un stand
    private function checkStand()
    {
        $user = Auth::user();
        if (!$user || !$user->stand) {
            return redirect()->route('stand_create')->with('error', 'Vous devez d’abord créer un stand avant de gérer vos produits.');
        }
        return null;
    }

    // Liste des produits
    public function index()
    {
        if ($redirect = $this->checkStand()) return $redirect;

        $produits = Produit::where('user_id', Auth::id())->get();
        return view('entrepreneur_produits', compact('produits'));
    }

    

    // Formulaire de création
    public function create()
    {
        if ($redirect = $this->checkStand()) return $redirect;

        return view('entrepreneure_create');
    }

    // Enregistrement d’un produit
    public function store(Request $request)
    {
        if ($redirect = $this->checkStand()) return $redirect;

        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
        ]);

        Produit::create([
            'user_id' => Auth::id(),
            'stand_id' => Auth::user()->stand->id,
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
        ]);

        return redirect()->route('entrepreneur_produits')->with('success', 'Produit ajouté avec succès.');
    }

    public function voirProduits($id)
    {
    $stand = Stand::with('produits')->findOrFail($id);
    return view('stand_produits', compact('stand'));
    }

   public function passerCommande($id)
   {
    $stand = Stand::findOrFail($id);
    return view('passer_commande', compact('stand'));
   }


    // Formulaire d'édition
    public function edit($id)
    {
        if ($redirect = $this->checkStand()) return $redirect;

        $produit = Produit::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('entrepreneure_edit', compact('produit'));
    }

    // Mise à jour du produit
    public function update(Request $request, $id)
    {
        if ($redirect = $this->checkStand()) return $redirect;

        $produit = Produit::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
        ]);

        $produit->update($request->only('nom', 'description', 'prix', 'quantite'));

        return redirect()->route('entrepreneur_produits')->with('success', 'Produit mis à jour.');
    }

    // Suppression du produit
    public function destroy($id)
    {
        if ($redirect = $this->checkStand()) return $redirect;

        $produit = Produit::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $produit->delete();

        return redirect()->route('entrepreneur_produits')->with('success', 'Produit supprimé.');
    }
}
