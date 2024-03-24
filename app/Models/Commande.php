<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'montant_total',
        'mode_paiement',
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function ligneCommandes(){
        return $this->hasMany(LigneCommande::class);
    }

    public function gestionnaire(){
        return $this->belongsTo(Gestionnaire::class);
    }
}
