<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stand;

class ExposantController extends Controller
{
    // Affiche la liste des stands approuvés
    public function index()
    {
        // Récupère tous les stands avec statut "approuve", du plus récent au plus ancien
        $stands = Stand::where('statut', 'approuve')->orderBy('created_at', 'desc')->get();

        // Passe la liste à la vue
        return view('exposants', compact('stands'));
    }
}
