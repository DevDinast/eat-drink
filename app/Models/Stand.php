<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stand extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'description',
        'statut',
        'photo',
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
