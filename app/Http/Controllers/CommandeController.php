<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Stand;

class CommandeController extends Controller
{
    public function create($id)
    {
        $stand = Stand::findOrFail($id);
        return view('commande.passer_commande', compact('stand'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'email_client' => 'nullable|email',
            'details' => 'nullable|string',
        ]);

        Commande::create([
            'stand_id' => $id,
            'nom_client' => $request->nom_client,
            'email_client' => $request->email_client,
            'details' => $request->details,
        ]);

        return redirect()->route('exposants')->with('success', 'Commande envoyée avec succès !');
    }
}
?>