<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'produit_id',
        'prix',
        'quantite',
        'total',
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function commande(){
        return $this->belongsTo(Commande::class);
    }
}
