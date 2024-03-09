<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    public function commandes(){
        return $this->hasMany(Commande::class);
    }

    public function ligneCommandes(){
        return $this->hasMany(LigneCommande::class);
    }

    public function stockMovements(){
        return $this->hasMany(StockMovement::class);
    }

}
