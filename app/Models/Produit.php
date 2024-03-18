<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
                    'nom',
                    'forme_galenique',
                    'dosage',
                    'prix',
                    'description',
                    'fabricant',
                    'code_CIP',
                    'date_peremption',
    ];

    public function commandes(){
        return $this->hasMany(Commande::class);
    }

    public function ligneCommandes(){
        return $this->hasMany(LigneCommande::class);
    }

    public function stockMovements(){
        return $this->hasMany(StockMovement::class);
    }
    public function getStockStateAttribute()
    {
        $entrees = $this->stockMovements()->where('movement_type', 'in')->sum('quantite');
        $sorties = $this->stockMovements()->where('movement_type', 'out')->sum('quantite');

        return $entrees - $sorties;
    }

}
