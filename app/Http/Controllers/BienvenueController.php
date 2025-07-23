<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stand;

class BienvenueController extends Controller
{
    public function index()
    {
        $stands = Stand::all();
        return view('Bienvenue', compact('stands'));
    }
} 