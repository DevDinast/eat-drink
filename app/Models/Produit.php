<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $table = 'produits';

    // Champs modifiables en masse
    protected $fillable = [
    'user_id',
    'stand_id',
    'nom',
    'description',
    'prix',
    'quantite',
];


    // Relation vers l'utilisateur (entrepreneur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

}
