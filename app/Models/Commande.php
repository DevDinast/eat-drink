<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'stand_id',
        'nom_client',
        'email_client',
        'details',
    ];

    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }
}
?>