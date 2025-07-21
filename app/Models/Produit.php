<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $table = 'products';

    // Champs modifiables en masse
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image_url',
        'user_id',
    ];

    // Relation vers l'utilisateur (entrepreneur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
