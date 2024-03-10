<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'quantite',
        'movement_type',
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
