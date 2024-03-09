<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function ligneCommandes(){
        return $this->hasMany(LigneCommande::class);
    }
}
